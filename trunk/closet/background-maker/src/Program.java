import java.io.File;
import java.nio.file.Paths;
import java.util.Scanner;


public class Program {

	public static void main(String[] args) {
		String currentPath = System.getProperty("user.dir");
		System.out.println("Currently running in " + currentPath);
		
		Scanner scan = new Scanner(System.in);
		
		File imagesLocation = readImagesLocation(scan);
		
		System.out.println("What should the new height of the images be?");
		int newHeight = readPositiveInt(scan);

		System.out.println("What percentage of the image should be transparent? (0-100)");
		double ratio = readPercentage(scan);
		
		System.out.println("What is the maximum transparency level (0-100)");
		double maxTransparency = readPercentage(scan);

		Resizer resizer = new Resizer(newHeight);
		Fader fader = new Fader(ratio / 100, maxTransparency / 100);
		ImageProcessor processor = new ImageProcessor(Paths.get("output/"), "PNG", resizer, fader);

		processor.processDirectory(imagesLocation);
		
		scan.close();
	}
	
	private static int readPositiveInt(Scanner scan) {
		int val = scan.nextInt();
		
		while (val <= 0) {
			System.out.println("Must be greater than 0.");
			val = scan.nextInt();
		}
		
		return val;
	}
	
	private static double readPercentage(Scanner scan) {
		double percent = scan.nextDouble();
		
		while (percent < 0 || percent > 100) {
			System.out.println("Must be between 0 and 100");
			percent = scan.nextDouble();
		}
		
		return percent;
	}

	private static File readImagesLocation(Scanner scan) {
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
