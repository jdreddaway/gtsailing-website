import java.io.File;
import java.nio.file.Paths;
import java.util.Scanner;


public class Program {

	public static void main(String[] args) {
		String currentPath = System.getProperty("user.dir");
		System.out.println("Currently running in " + currentPath);
		
		Scanner scan = new Scanner(System.in);
		
		File imagesLocation = getImagesLocation(scan);

		System.out.println("What percentage of the image should be transparent? (0-100)");
		double ratio = getPercentage(scan);
		
		System.out.println("What is the maximum transparency level (0-100)");
		double maxTransparency = getPercentage(scan);

		BGTransformer transformer = new BGTransformer(ratio / 100, maxTransparency / 100);
		ImageProcessor processor = new ImageProcessor(Paths.get("output/"), "PNG", transformer);

		processor.processDirectory(imagesLocation);
		
		scan.close();
	}
	
	private static double getPercentage(Scanner scan) {
		double percent = scan.nextDouble();
		
		while (percent < 0 || percent > 100) {
			System.out.println("Must be between 0 and 100");
			percent = scan.nextDouble();
		}
		
		return percent;
	}

	private static File getImagesLocation(Scanner scan) {
		System.out.println("Where are the original background images located?");
		
		String strImgLoc = scan.nextLine();
		File imagesLocation = Paths.get(strImgLoc).toFile();
		
		while (!imagesLocation.exists()) {
			System.out.println("That location does not exist. Please enter a differenc location.");
			strImgLoc = scan.nextLine();
			imagesLocation = Paths.get(strImgLoc).toFile();
		}
		
		return imagesLocation;
	}
	
}
