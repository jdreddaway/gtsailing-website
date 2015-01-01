import java.awt.image.BufferedImage;
import java.awt.image.WritableRaster;


public class Fader {

	private final double transparencyRatio; // a number between 0 and 1
	private final double maxTransparencyRatio;

	/**
	 * @param transparencyRatio The ratio of the picture to be affected. Should be between 0 and 1.
	 * @param maxTransparencyRatio Must be between 0 and 1
	 */
	public Fader(double transparencyRatio, double maxTransparencyRatio) {
		this.transparencyRatio = transparencyRatio;
		this.maxTransparencyRatio = maxTransparencyRatio;
	}
	
	public BufferedImage transform(BufferedImage in) {
		int numRowsToAffect = (int) (transparencyRatio / 2 * in.getHeight());
		final double alphaChangePerRow = 255.0 * maxTransparencyRatio / numRowsToAffect;
		BufferedImage out = new BufferedImage(in.getWidth(), in.getHeight(), BufferedImage.TYPE_INT_ARGB);
		out.createGraphics().drawImage(in, 0, 0, null);
		WritableRaster alpha = out.getAlphaRaster();

		double currentAlpha = 255 - alphaChangePerRow;
		for (int row = numRowsToAffect - 1; row >= 0; row--) {
			changeAlphaOnRow(out, alpha, currentAlpha, row);
			currentAlpha -= alphaChangePerRow;
		}
		
		currentAlpha = 255 - alphaChangePerRow;
		for (int row = out.getHeight() - numRowsToAffect; row < out.getHeight(); row++) {
			changeAlphaOnRow(out, alpha, currentAlpha, row);
			currentAlpha -= alphaChangePerRow;
		}
		
		return out;
	}

	private void changeAlphaOnRow(BufferedImage out, WritableRaster alphaRaster, double alpha, int row) {
		for (int col = 0; col < out.getWidth(); col++) {
			alphaRaster.setPixel(col, row, new int[] { (int) alpha });
		}
	}
}
