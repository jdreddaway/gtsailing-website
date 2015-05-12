import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import java.nio.file.Path;

import javax.imageio.ImageIO;


public class ImageProcessor {

	private final Path outputDirectory;
	private final Fader transformer;
	private final String transparentImgFormat;
	private final Resizer resizer;
	private final String opaqueImgFormat;

	public ImageProcessor(Path outputDirectory, String transparentImgFormat, String opaqueImgFormat,
			Resizer resizer, Fader transformer) {
		this.outputDirectory = outputDirectory;
		this.transparentImgFormat = transparentImgFormat;
		this.opaqueImgFormat = opaqueImgFormat;
		this.resizer = resizer;
		this.transformer = transformer;
	}
	
	public void processDirectory(File directory) {
		File[] images = directory.listFiles();
		for (File each : images) {
			if (each.isFile()) {
				processFile(each, directory.toPath());
			}
		}
	}

	private void processFile(File file, Path imagesDir) {
		System.out.println("Processing " + file.getName());
		try {
			BufferedImage original = ImageIO.read(file);
			BufferedImage resized = resizer.resize(original);
			FadedImage processed = transformer.transform(resized);

			Path fullOutputDir = imagesDir.resolve(outputDirectory);
			File outputDir = fullOutputDir.toFile();
			if (!outputDir.exists()) {
				boolean madeDir = outputDir.mkdir();
				if (!madeDir) {
					throw new IOException("Could not make the output directory " + fullOutputDir);
				}
			}

			try {
				File topFile = createOutputFile(
						fullOutputDir, file.getName(), "top", transparentImgFormat.toLowerCase());
				ImageIO.write(processed.top, transparentImgFormat, topFile);
				
				File midFile = createOutputFile(
						fullOutputDir, file.getName(), "mid", opaqueImgFormat.toLowerCase());
				ImageIO.write(processed.middle, opaqueImgFormat, midFile);
				
				File botFile = createOutputFile(
						fullOutputDir, file.getName(), "bot", transparentImgFormat.toLowerCase());
				ImageIO.write(processed.bottom, transparentImgFormat, botFile);
			} catch (IOException e) {
				System.out.println("Could not write file.");
				e.printStackTrace();
			}
		} catch (IOException e) {
			System.out.println("Had trouble processing " + file.getName());
			e.printStackTrace();
		}
	}
	
	private File createOutputFile(Path fullOutputDir, String currentImageName, String part, String extension)
			throws IOException {
		Path outputPath = fullOutputDir.resolve(getNewName(currentImageName, part, extension));
		File outputFile = outputPath.toFile();

		if (!outputFile.exists()) {
			System.out.println("Path: " + outputPath);
			outputFile.createNewFile();
		}
		
		return outputFile;
	}
	
	/**
	 * 
	 * @param originalName
	 * @param part Which part of the image this image belongs to; should be either top, mid, or bot
	 * @return
	 */
	private String getNewName(String originalName, String part, String extension) {
		int iPeriod = originalName.lastIndexOf('.');
		String noExtensionName;
		if (iPeriod > 0) {
			noExtensionName = originalName.substring(0, iPeriod);
		} else {
			noExtensionName = originalName;
		}
		return noExtensionName + "_" + part + "." + extension;
	}
}
