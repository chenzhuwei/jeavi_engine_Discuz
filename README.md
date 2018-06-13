# jeavi_engine_Discuz
全新设计简洁 时尚METRO 门户资讯社区型清新风格，模版设计页面包括，首页，资讯页面，资讯内页，论坛首页，论坛列表页面，论坛内页，瀑布流页面等等。版经过为期一个月制作现已兼容各主流浏览器，是款不错的风格模版。


Discuz!提示“对不起,您安装的不是正版应用,安装程序无法继续执行”

当我们在使用别人购买的Discuz x2.5模板或者插件是，系统会提示我们:对不起,您安装的不是正版应用,安装程序无法继续执行。这个是因为这个模板、插件是正版的，而discuz 社区在更新到2.0以上后，增加了对插件的版本检测，那名我们有没有办法解决呢？答案是很简单的。

在网站的根目录下找到/source/function/function_cloudaddons.php这个文件，然后打开，再找到cloudaddons_validator标记，删去或者注释掉





cpmsg('cloudaddons_genuine_message', '', 'error', array('addonid' => $addonid));



注释方法如下：
Markup
function cloudaddons_validator($addonid) {
    $array = cloudaddons_getmd5($addonid);
    if(cloudaddons_open('&mod=app&ac=validator&addonid='.$addonid.($array !== false ? '&rid='.$array['RevisionID'].'&sn='.$array['SN'].'&rd='.$array['RevisionDateline'] : '')) === '0') {
    }
}
