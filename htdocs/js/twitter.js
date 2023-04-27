function onClickTweet() {
  var tw_contents = ("「三大" + theme + "」は" + name + "です。");
  var url = encodeURIComponent(document.location);
  window.open().location.href = ("https://twitter.com/share?url=" + url + "&text=" + tw_contents + "&count=none&lang=ja");
};