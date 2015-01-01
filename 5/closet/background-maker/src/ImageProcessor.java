import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import java.nio.file.Path;

import javax.imageio.ImageIO;


public class ImageProcessor {

	private final Path outputDirectory;
	private final Fader transformer;
	private final String imageFormat;
	private final Resizer resizer;

	public ImageProcessor(Path outputDirectory, String imageFormat, Resizer resizer, Fader transformer) {
		this.outputDirectory = outputDirectory;
		this.imageFormat = imageFormat;
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
			BufferedImage processed = transformer.transform(resized);

			Path fullOutputDir = imagesDir.resolve(outputDirectory);
			File outputDir = fullOutputDir.toFile();
			if (!outputDir.exists()) {
				boolean madeDir = outputDir.mkdir();
				if (!madeDir) {
					throw new IOException("Could not make the output directory " + fullOutputDir);
				}
			}

			try {
				File outputFile = createOutputFile(fullOutputDir, file.getName());
				ImageIO.write(processed, imageFormat, outputFile);
			} catch (IOException e) {
				System.out.println("Could not write file.");
				e.printStackTrace();
			}
		} catch (IOException e) {
			System.out.println("Had trouble processing " + file.getName());
			e.printStackTrace();
		}
	}
	
	private File createOutputFile(Path fullOutputDir, String currentImageName) throws IOException {
		Path outputPath = fullOutputDir.resolve(getNewName(currentImageName));
		File outputFile = outputPath.toFile();

		if (!outputFile.exists()) {
			System.out.println("Path: " + outputPath);
			outputFile.createNewFile();
		}
		
		return outputFile;
	}
	
	private String getNewName(String originalName) {
		int iPeriod = originalName.lastIndexOf('.');
		String noExtensionName;
		if (iPeriod > 0) {
			noExtensionName = originalName.substring(0, iPeriod);
		} else {
			noExtensionName = originalName;
		}
		return noExtensionName + "." + imageFormat.toLowerCase();
	}
}
