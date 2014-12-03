<?php
namespace CarlosIO\Geckoboard\Widgets;
use CarlosIO\Geckoboard\Data\Highchart\Legend;

/**
 * Class LineChart
 * @package CarlosIO\Geckoboard\Widgets
 */
class HighchartsChart extends Widget
{

    protected $type;

    protected $title;

    protected $titleColor = null;

    protected $subtitle;

    protected $series = array();

    protected $serieColors = array();

    protected $xAxisTitle;

    protected $xAxisLabels = array();

    protected $yAxisTitle;

    protected $yAxisLabels = array();

    protected $backgroundColor = null;

    protected $chartGridLinesColor = null;

    protected $yAxisTitleColor = null;

    protected $legend = null;



    /**
     * @return array
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @param array $series
     *
     * @return $this
     */
    public function setSeries($series)
    {
        $this->series = $series;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param mixed $subtitle
     *
     * @return $this
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return array
     */
    public function getXAxisLabels()
    {
        return $this->xAxisLabels;
    }

    /**
     * @param array $xAxisLabels
     *
     * @return $this
     */
    public function setXAxisLabels($xAxisLabels)
    {
        $this->xAxisLabels = $xAxisLabels;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getXAxisTitle()
    {
        return $this->xAxisTitle;
    }

    /**
     * @param mixed $xAxisTitle
     *
     * @return $this
     */
    public function setXAxisTitle($xAxisTitle)
    {
        $this->xAxisTitle = $xAxisTitle;

        return $this;
    }

    /**
     * @return array
     */
    public function getYAxisLabels()
    {
        return $this->yAxisLabels;
    }

    /**
     * @param array $yAxisLabels
     *
     * @return $this
     */
    public function setYAxisLabels($yAxisLabels)
    {
        $this->yAxisLabels = $yAxisLabels;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getYAxisTitle()
    {
        return $this->yAxisTitle;
    }

    /**
     * @param mixed $yAxisTitle
     *
     * @return $this
     */
    public function setYAxisTitle($yAxisTitle)
    {
        $this->yAxisTitle = $yAxisTitle;

        return $this;
    }

    /**
     * @return string
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor === null ? "transparent" : $this->backgroundColor;
    }

    /**
     * Set to null for transparent
     *
     * @param string $backgroundColor
     */
    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;
    }

    /**
     * @return string
     */
    public function getChartGridLinesColor()
    {
        return $this->chartGridLinesColor;
    }

    /**
     * @param string $chartGridLinesColor
     */
    public function setChartGridLinesColor($chartGridLinesColor)
    {
        $this->chartGridLinesColor = $chartGridLinesColor;
    }

    /**
     * @return mixed
     */
    public function getTitleColor()
    {
        return $this->titleColor;
    }

    /**
     * @param mixed $titleColor
     */
    public function setTitleColor($titleColor)
    {
        $this->titleColor = $titleColor;
    }

    /**
     * @return null|Legend
     */
    public function getLegend()
    {
        return $this->legend;
    }

    /**
     * @param null|Legend $legend
     */
    public function setLegend(Legend $legend)
    {
        $this->legend = $legend;
    }

    public function setSingleSerie($serieName, $serie)
    {
        $this->series[$serieName] = $serie;
    }

    public function setSerieColor($serieName, $color)
    {
        $this->serieColors[$serieName] = $color;
    }

    public function getSerieColor($serieName)
    {
        return $this->serieColors[$serieName];
    }

    public function addItemSerie($serieName, $item)
    {
        if (!isset($this->series[$serieName])) {
            $this->setSingleSerie($serieName, array());
        }
        $this->series[$serieName][] = $item;
    }

    /**
     * @return null|string
     */
    public function getYAxisTitleColor()
    {
        return $this->yAxisTitleColor;
    }

    /**
     * @param null|string $yAxisTitleColor
     */
    public function setYAxisTitleColor($yAxisTitleColor)
    {
        $this->yAxisTitleColor = $yAxisTitleColor;
    }

    /**
     * {@inheritdoc}
     */
    public function getData()
    {

        $returnValues = array(
            'chart' => array(
                'type' => $this->getType(),
                'backgroundColor' => $this->getBackgroundColor(),
                'style' => array(
                    'color' => $this->chartGridLinesColor
                )
            ),
            'title' => array(
                'text' => $this->getTitle()
            ),
            'subtitle' => array(
                'text' => $this->getSubtitle()
            ),
        );

        if($this->getChartGridLinesColor()) {
            $returnValues['chart']['style'] = ['color' => '#'.$this->getChartGridLinesColor()];
        }

        if($this->getTitleColor()) {
            $returnValues['title']['style'] = ['color' => '#'.$this->getTitleColor()];
        }

        if ($this->getXAxisLabels()) {
            $returnValues['xAxis']['categories'] = $this->getXAxisLabels();
        }
        if ($this->getYAxisLabels()) {
            $returnValues['yAxis']['categories'] = $this->getYAxisLabels();
        }

        if ($this->getXAxisTitle()) {
            $returnValues['xAxis']['title']['text'] = $this->getXAxisTitle();
        }
        if ($this->getYAxisTitle()) {
            $returnValues['yAxis']['title']['text'] = $this->getYAxisTitle();
        }

        if ($this->getYAxisTitleColor()) {
            $returnValues['yAxis']['title']['style'] = ['color' => '#'.$this->getYAxisTitleColor()];
        }

        if($this->getLegend()){
            $returnValues['legend'] = $this->getLegend()->getData();
        }

        $returnValues['plotOptions'] = array(
            'line' => array(
                'dataLabels' => array(
                    'enabled' => true
                ),
                'enableMouseTracking' => false
            )
        );

        foreach ($this->getSeries() as $serieName => $serieValues) {
            $serieData = array(
                'name' =>  (isset($serieValues['name']) && $serieValues['name']) ? $serieValues['name'] : $serieName,
                'data' =>  (isset($serieValues['data']) && $serieValues['data']) ? $serieValues['data'] : $serieValues,
                'type' =>  (isset($serieValues['type']) && $serieValues['type']) ? $serieValues['type'] : 'line',
                'color' => (isset($this->serieColors[$serieName]) && $this->serieColors[$serieName]) ? "#".$this->serieColors[$serieName] : "#cccccc"
            );

            $returnValues['series'][] = $serieData;
        }

        return array('highchart' => $returnValues);
    }
}
