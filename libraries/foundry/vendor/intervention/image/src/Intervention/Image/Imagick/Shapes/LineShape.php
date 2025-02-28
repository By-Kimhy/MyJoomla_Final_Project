<?php
/**
* @package      Foundry
* @copyright    Copyright (C) Stack Ideas Sdn Bhd. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* Foundry is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

namespace Intervention\Image\Imagick\Shapes;

defined('_JEXEC') or die('Unauthorized Access');

use Intervention\Image\AbstractShape;
use Intervention\Image\Image;
use Intervention\Image\Imagick\Color;

class LineShape extends AbstractShape
{
    /**
     * Starting point x-coordinate of line
     *
     * @var int
     */
    public $x = 0;

    /**
     * Starting point y-coordinate of line
     *
     * @var int
     */
    public $y = 0;

    /**
     * Color of line
     *
     * @var string
     */
    public $color = '#000000';

    /**
     * Width of line in pixels
     *
     * @var int
     */
    public $width = 1;

    /**
     * Create new line shape instance
     *
     * @param int $x
     * @param int $y
     */
    public function __construct($x = null, $y = null)
    {
        $this->x = is_numeric($x) ? intval($x) : $this->x;
        $this->y = is_numeric($y) ? intval($y) : $this->y;
    }

    /**
     * Set current line color
     *
     * @param  string $color
     * @return void
     */
    public function color($color)
    {
        $this->color = $color;
    }

    /**
     * Set current line width in pixels
     *
     * @param  int $width
     * @return void
     */
    public function width($width)
    {
        $this->width = $width;
    }

    /**
     * Draw current instance of line to given endpoint on given image
     *
     * @param  Image   $image
     * @param  int     $x
     * @param  int     $y
     * @return boolean
     */
    public function applyToImage(Image $image, $x = 0, $y = 0)
    {
        $line = new \ImagickDraw;

        $color = new Color($this->color);
        $line->setStrokeColor($color->getPixel());
        $line->setStrokeWidth($this->width);

        $line->line($this->x, $this->y, $x, $y);
        $image->getCore()->drawImage($line);

        return true;
    }
}
