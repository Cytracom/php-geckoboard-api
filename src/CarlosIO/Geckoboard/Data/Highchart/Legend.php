<?php
/**
 * Created by IntelliJ IDEA.
 * User: jbarber
 * Date: 12/3/14
 * Time: 11:41 AM
 */

namespace CarlosIO\Geckoboard\Data\Highchart;


class Legend {
    protected $labelColor = null;
    protected $layout = null;
    protected $horizontalAlign = null;
    protected $verticalAlign = null;
    protected $borderWidth = null;

    /**
     * @return null|string
     */
    public function getLabelColor()
    {
        return $this->labelColor;
    }

    /**
     * @param null|string $LabelColor
     */
    public function setLabelColor($LabelColor)
    {
        $this->labelColor = $LabelColor;
    }

    /**
     * @return null|string
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * @param null $Layout
     */
    public function setLayout($Layout)
    {
        $this->layout = $Layout;
    }

    /**
     * @return null|string
     */
    public function getHorizontalAlign()
    {
        return $this->horizontalAlign;
    }

    /**
     * @param null|string $HorizontalAlign
     */
    public function setHorizontalAlign($HorizontalAlign)
    {
        $this->horizontalAlign = $HorizontalAlign;
    }

    /**
     * @return null|string
     */
    public function getBorderWidth()
    {
        return $this->borderWidth;
    }

    /**
     * @param null|string $BorderWidth
     */
    public function setBorderWidth($BorderWidth)
    {
        $this->borderWidth = $BorderWidth;
    }

    /**
     * @return null|string
     */
    public function getVerticalAlign()
    {
        return $this->verticalAlign;
    }

    /**
     * @param null|string $verticalAlign
     */
    public function setVerticalAlign($verticalAlign)
    {
        $this->verticalAlign = $verticalAlign;
    }

    public function getData() {
        return [
            'itemStyle' => [
                'color' => $this->getLabelColor() === null ? null : '#'.$this->getLabelColor(),
            ],
            'layout' => $this->getLayout(),
            'align' => $this->getHorizontalAlign(),
            'verticalAlign' => $this->getVerticalAlign(),
            'borderWidth' => $this->getBorderWidth()
        ];
    }
}