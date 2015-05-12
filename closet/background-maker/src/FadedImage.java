import java.awt.image.BufferedImage;


public class FadedImage {

	public final BufferedImage top, middle, bottom;
	
	public FadedImage(BufferedImage top, BufferedImage middle, BufferedImage bottom) {
		this.top = top;
		this.middle = middle;
		this.bottom = bottom;
	}

}
