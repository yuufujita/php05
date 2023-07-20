<?php require'p00_header.php';?>
<?php require_once('p99_funcs.php')?>

<?php
//1.  DB接続（p00_header.phpに記載）
session_start();

//２．データ表示（ログイン名）
$view2="";

if(isset($_SESSION['user_nm'])){
  $view2 .= $_SESSION['user_nm'] . 'さん、ログインありがとうございます！';
}else{
  $view2 .= 'ご訪問くださりありがとうございます！';
}

//３．データ取得SQL作成（投稿情報）
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//４．データ表示（投稿情報）
$view="";
$lat="";
$lon="";

if ($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){

    $view .= '<div id ="post-data" class="card">'; //.=にすることで上書きでなく追加される
    $view .= '<p >'.'投稿者:' . h($result['user_nm']) . '</p>';
    $view .= '一押し：<br>';
    $view .= '<img src="' . h($result['image01']) . '" alt="一押し写真"><br>';

if(!isset($_SESSION['kanri_flg'])){
    $view .= '<p>'.'<a class="btn btn-secondary" type="button" href="p81_login.php">';
    $view .= '詳細を見る'.'</a>'.'</p>';
}

  if(isset($_SESSION['kanri_flg']) && ($_SESSION['kanri_flg']===0 || $_SESSION['kanri_flg']===1)){
    $view .= '<p>'.'<button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">';
    $view .= '詳細を見る'.'</button>'.'</p>';
    $view .= '<div class="collapse" id="collapseExample">';
    $view .= '<div class="card-body">';
    $view .= '宿泊先：<br>';
    $view .= '<img src="' . h($result['image02']) . '" alt="宿泊先写真"><br>';
    $view .= '<table>';
    $view .= '<tr>';
    $view .= '<td class="left">'.'更新日付'.'</td>';
    $view .= '<td class="right">'.h($result['date']).'</td>';
    $view .= '</tr>';
    $view .= '<tr>';
    $view .= '<td class="left">'.'宿泊先'.'</td>';
    $view .= '<td class="right">'.h($result['stay_nm']).'</td>';
    $view .= '</tr>';
    $view .= '<tr>';
    $view .= '<td class="left">'.'宿泊先URL'.'</td>';
    $view .= '<td class="right">'.'<a href="'.h($result['stay_url']).'">'.h($result['stay_url']).'</a></td>';
    $view .= '</tr>';
    $view .= '<tr>';
    $view .= '<td class="left">'.'宿泊先への公共交通機関'.'</td>';
    $view .= '<td class="right">'.h($result['access']).'</td>'; 
    $view .= '</tr>';
    $view .= '<tr>';
    $view .= '<td class="left">'.'一押しメモ'.'</td>';
    $view .= '<td class="right">'.h($result['recommend_memo']).'</td>';
    $view .= '</tr>'; 
    $view .= '<tr>';
    $view .= '<td class="left">'.'宿泊先メモ'.'</td>';
    $view .= '<td class="right">'.h($result['stay_memo']).'</td>';
    $view .= '</tr>'; 
    $view .= '</table>';
    $view .= '</div>';
    $view .= '</div>';
    $view .= '<input type="hidden" value="' . h($result['lat'])  . '">';
    $view .= '<input type="hidden" value="' . h($result['lon'])  . '">';
    $view .= '<button id="search" type="button" onclick="getLonLatData(this)">'.'現在地からの経路検索'.'</button>';
    $view .= '<button>'.'<a href="p23_control.php?id=' . h($result['id']).'">'.'質問する'.'</a>'.'</button>';
  }
  
  if(isset($_SESSION['kanri_flg']) && ($_SESSION['user_id']===$result['user_id'] || $_SESSION['kanri_flg']===1)){
    $view .= '<button>'.'<a href="p04_detail.php?id=' . h($result['id']).'">'.'更新'.'</a>'.'</button>';
    //$view .= '<button>'.'<a href="p06_delete.php?id=' . h($result['id']).'">'.'削除'.'</a>'.'</button>';
    //$view .= '<button onclick="confirmDelete(' . h($result['id']) . ')">' . '削除' . '</button>';
    $view .= '<button onclick="confirmDelete(' . h($result['id']) . ', \'' . h($result['image01']) . '\', \'' . h($result['image02']) . '\')">' . '削除' . '</button>';
  }
  
  if(isset($_SESSION['kanri_flg']) && ($_SESSION['kanri_flg']===1)){
    $view .= '<p class="lat-lon">'.'緯度:' . h($result['lat']) . '／経度:' . h($result['lon'])  . '</p>';
  }
    $view .= '</div>';
  }
}
?>

<script
src="https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key"
async
defer
></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
function GetMap(lat, lon) {
  const map = new Microsoft.Maps.Map("#myMap", {
    center: new Microsoft.Maps.Location(35.669099, 139.703436),
    mapTypeId: Microsoft.Maps.MapTypeId.load,
    zoom: 8,
  });

// 現在位置を取得
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(
    function (position) {
      const currentPosition = new Microsoft.Maps.Location(
        position.coords.latitude,
        position.coords.longitude
        );

// 左側_Load the directions module.
Microsoft.Maps.loadModule(
  "Microsoft.Maps.Directions",
  function () {
    // Create an instance of the directions manager.
    const directionsManager =
    new Microsoft.Maps.Directions.DirectionsManager(map);

    // 出発地を現在位置に設定
    const startWaypoint =
    new Microsoft.Maps.Directions.Waypoint({
      location: currentPosition,
    });
    directionsManager.addWaypoint(startWaypoint, 0);
    
    //let lat = <?= $lat ?> // 最終レコードの $lat を参照していることはわかった
    //let lon = <?= $lon ?> // 最終レコードの $lon を参照していることはわかった
    console.log(lat,'初期表示内容でDBの最終レコードlat、phpファイルの136行目');
    console.log(lon,'初期表示内容でDBの最終レコードlon、phpファイルの137行目');
    
    const endWaypoint = 
    new Microsoft.Maps.Directions.Waypoint({
      location: new Microsoft.Maps.Location(lat, lon) });
    directionsManager.addWaypoint(endWaypoint, 1);
    directionsManager.setRenderOptions({ itineraryContainer: "#directionsItinerary" });
    directionsManager.showInputPanel("directionsPanel")
  })

// マップを現在位置にセンタリング
map.setView({ center: currentPosition });

},
function (error) {
  console.log("現在位置の取得に失敗しました。");
}
);
} else {
  console.log("お使いのブラウザはGeolocation APIをサポートしていません。"
  );
}
}

function getLonLatData(e){
  alert("現在地と目的地の検索を開始します！！！"); // これは動く
  console.dir(e,'163行目');
  console.dir(e.parentNode);
  const lat = e.parentNode.childNodes[7].defaultValue
  const lon = e.parentNode.childNodes[8].defaultValue
  console.log("167行目");
  console.log(lat,'168行目');
  console.log(lon,'169行目');
  console.dir(e.parentNode.childNodes[5].innerText);

// ここで取得した緯度経度をGetMap関数に渡してブラウザに描画
GetMap(lat, lon);
}

/*　うまくいかなかった部分
function clickAlert() {
  alert("ボタンがクリックされました！"); // これは動く
  lat = $(this).closest("#post-data").find(".lat-lon").data("lat");
  lon = $(this).closest("#post-data").find(".lat-lon").data("lon");
  console.log(lat,'phpファイルの144行目'); // undefinedになる
  //GetMap(lat, lon);
}
*/

/*　上のclickAlertのコードとの違いがわからなくて、動かない部分
$("#search").on("click", function () {
  const lat = $(this).closest("#post-data").find(".lat-lon").data("lat");
  const lon = $(this).closest("#post-data").find(".lat-lon").data("lon");
  console.log(lat);
  console.log('ボタンがクリックされました！');
  GetMap(lat, lon);
});
*/

function confirmDelete(id, image01, image02) {
  if (window.confirm("本当に削除して大丈夫ですか？")) {
    // 画像とデータベースの両方を削除するためのリンクへリダイレクト
    window.location.href = "p06_delete.php?id=" + id + "&image01=" + image01 + "&image02=" + image02;
  }
}

/*
function confirmDelete(id) {
  if (window.confirm("本当に削除して大丈夫ですか？")) {
    // 削除処理を実行するためのリンクへリダイレクトするなど、適切な処理を追加してください
    window.location.href = "p06_delete.php?id=" + id;
  }
}
*/

</script>

<!-- Main[Start] -->
<div class ='container'>
<div><?= $view2 ?></div>
<a class="btn btn-primary" href="p01_index.php">投稿する</a>
</div>
<div id="post-all"><?= $view ?></div>
<div id="map" class="contents">
  <h2 class="title">DESTINATION</h2>
  <div class="map"></div>
  <div class="destination">
    <div id="myMap"></div>
    <div class="directionsContainer">
      <div id="directionsPanel"></div>
      <div id="directionsItinerary"></div>
    </div>
  </div>
<!-- Main[End] -->

<?php require'p99_footer.php';?>