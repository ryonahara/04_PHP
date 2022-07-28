<?php
/**
 * Google Chart Tools: Image Charts を利用したグラフ作成クラス
 */
class Chart
{
  protected $title = "";
  protected $width;
  protected $height;
  protected $yMax;
  protected $yMin;
  protected $xLabel;
  protected $xAxisName = "";
  protected $yAxisName = "";
  protected $dataset;
  protected $numXPoints;
  protected $showLegend = FALSE;

  /**
   * Chartクラスのコンストラクタ
   */
  public function __construct() {
    $this->width  = 100;
    $this->height = 100;
    srand(32);
  }

  /**
   * データセットを追加する
   * @param array  $data データセット
   * @param string $name データセットの名前
   * @throws Exception
   */
  public function addData($data, $name="") {
    if (!is_array($data)) {
      throw new Exception("データは配列を指定してください。");
    }
    if (empty($name)) {
      $name = count($this->dataset);
    }
    $this->dataset[$name]["data"] = $data;
    $autoColor = rand(0, 0xffffff);
    $this->dataset[$name]["color"] = sprintf("%06x", $autoColor);
    if (isset($this->yMax)) {
      $this->yMax = max($this->yMax, max($data));
    }
    else {
      $this->yMax = max($data);
    }
    if (isset($this->yMin)) {
      $this->yMin = min($this->yMin, min($data));
    }
    else {
      $this->yMin = min($data);
    }
    if (isset($this->numXPoints)) {
      $this->numXPoints = max($this->numXPoints, count($data));
    }
    else {
      $this->numXPoints = count($data);
    }
  }

  /**
   * グラフ画像のサイズを指定する
   * @param int $width  チャート画像の幅（ピクセル）
   * @param int $height チャート画像の高さ（ピクセル）
   */
  public function setSize($width, $height) {
    $this->width  = $width;
    $this->height = $height;
  }

  /**
   * グラフのタイトルを指定する
   * @param string $title タイトル文字列
   */
  public function setTitle($title) {
    $this->title = $title;
  }

  /**
   * X軸の名前を設定する
   * @param string $name
   */
  public function setXAxisName($name) {
    $this->xAxisName = $name;
  }

  /**
   * Y軸の名前を設定する
   * @param string $name
   */
  public function setYAxisName($name) {
    $this->yAxisName = $name;
  }

  /**
   * X軸のラベルを指定する
   * @param array $data ラベル文字列を格納した配列
   */
  public function setXLabel($data) {
    $this->xLabel = $data;
    if (isset($this->numXPoints)) {
      $this->numXPoints = max($this->numXPoints, count($data));
    }
    else {
      $this->numXPoints = count($data);
    }
  }

  /**
   * 凡例の表示／非表示を設定する
   * @param bool $switch
   */
  public function setShowLegend($switch) {
    $this->showLegend = $switch;
  }

  /**
   * チャートを出力する
   * @param string $type チャートタイプ
   */
  protected function printChart($type="lc") {
    // img tag
    echo '<img src="';
    // Google chart API URL
    echo "http://chart.apis.google.com/chart?";
    // chart size
    echo "chs=" . $this->width . "x" . $this->height;
    if ($this->title !== "") {
      echo "&chtt=" . $this->title;
    }
    // chart data
    if ($this->yMin > 0) {
      $this->yMin = 0; // adjust
    }
    $delta = $this->yMax - $this->yMin;
    $margin = $delta * 0.05;
    if ($this->yMin < 0) {
      $range = $delta + 2 * $margin;
      $ymin = $this->yMin - $margin;
    }
    else {
      $range = $delta + $margin;
      $ymin = $this->yMin;
    }
    $ymax = $this->yMax + $margin;
    $data = array();
    foreach ($this->dataset as $set) {
      if ($this->numXPoints > count($set["data"])) {
        $values = array_merge($set["data"], array_fill(0, $this->numXPoints - count($set["data"]), "_"));
      }
      else {
        $values = $set["data"];
      }
      $data[] = implode(",", $values);
    }
    echo "&chd=t:" . implode("|", $data);
    // y range
    echo "&chds=a";
    // marker
    $data = array();
    for ($i = 0; $i < count($this->dataset); $i++) {
      $data[] = "N,000000," . $i .",-1,9";
    }
    echo "&chm=" . implode("|", $data);
    // chart color
    $color = array();
    foreach ($this->dataset as $data) {
      $color[] = $data["color"];
    }
    echo "&chco=" . implode(",", $color);
    // chart legend
    if ($this->showLegend) {
      $name = array();
      foreach ($this->dataset as $key => $data) {
        $name[] = $key;
      }
      echo "&chdl=" . implode("|", $name);
    }
    // chart range
    echo "&chxr=1," . $ymin . "," . $ymax;
    // chart label
    echo "&chxt=x,y,x,y";
    if ($this->numXPoints > count($this->xLabel)) {
      $values = array_merge($this->xLabel, array_fill(0, $this->numXPoints - count($this->xLabel), ""));
    }
    else {
      $values = $this->xLabel;
    }
    echo "&chxl=0:|" . implode("|", $values) . "|";
    echo "2:|" . $this->xAxisName . "|";
    echo "3:|" . $this->yAxisName . "|";
    $xLabelPosition = 50;
    $yLabelPosition = $range / 2 + $ymin;
    echo "&chxp=2," . $xLabelPosition . "|3," . $yLabelPosition;
    // chart type
    echo "&cht=" . $type;
    // fill type
    echo "&chf=bg,s,00000000";
    echo '" />';
  }

  /**
   * 棒グラフ画像を出力する
   */
  public function printBarChart() {
    $this->printChart("bvg");
  }

  /**
   * 折れ線グラフ画像を出力する
   */
  public function printLineChart() {
    $this->printChart("lc");
  }
}
