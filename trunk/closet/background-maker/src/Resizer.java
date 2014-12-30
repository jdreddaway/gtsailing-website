import java.awt.image.BufferedImage;

class Resizer {

	private final int newHeight;

	Resizer(int newHeight) {
		this.newHeight = newHeight;
	}
	
	BufferedImage resize(BufferedImage in) {
		if (in.getHeight() <= newHeight) { 
			return in;
		}

		double widthToHeightRatio = 1.0 * in.getWidth() / in.getHeight();
		int newWidth = (int) Math.round(widthToHeightRatio * newHeight);
		BufferedImage out = new BufferedImage(newWidth, newHeight, BufferedImage.TYPE_INT_ARGB);
		out.getGraphics().drawImage(in, 0, 0, newWidth, newHeight, null);
		return out;
	}
}
