<?php
/**
 * Time前端基于Multiverse. 由钻芒适配开发. 请保留底部版权.由于作者经营不善，钻芒已被收购，导致部分功能无法正常使用，现由<a href="https://www.nullhut.com">无名小屋</a>优化代码配置</b>（打包时间:2025年1月18日17:40:28）<ul><li>解决1.1.4版本图片无法加载的问题</li><li>优化外部的加载方式</li><li>修复 JavaScript 逻辑</li><li>增强安全性和异常处理</li><li>由于www.zmki.cn域名内容不方便展示，已将源代码内的此链接更换成www.nullhut.com</li></ul>
 * @package Time(nullhut改)
 * @author zmki and nullhut
 * @version 1.1.4(改)
 * @link https://www.nullhut.com
 */
?>
<!DOCTYPE html>
<!--时光相册-Time-->
<!--version: 1.1.4(改)-->
<!--publish time:2025/1/18-->
<html>
<head>
    <title><?php echo htmlspecialchars($this->options->IndexName()) ?>-<?php echo htmlspecialchars($this->options->Indexdict()) ?></title>
    <meta http-equiv="content-type" content="text/html; charset=<?php echo htmlspecialchars($this->options->charset()) ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="keywords" content="<?php echo htmlspecialchars($this->options->keywords()) ?>"/>
    <meta name="description" content="<?php echo htmlspecialchars($this->options->description()) ?>"/>
    <!-- 引入基础样式 -->
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('assets/css/fontawesome-all.min.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('assets/css/main.css') ?>" />
    <noscript><link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/noscript.css') ?>" /></noscript>
    <!-- 减少重复资源引入 -->
    <link rel="stylesheet" href="//at.alicdn.com/t/font_1635479_m8o2ir6mitf.css">
    <link rel="shortcut icon" href="/usr/themes/time/favicon.ico" type="image/x-icon" />
    <!-- 将JavaScript资源放在底部以提高页面加载速度 -->
    <script src="https://at.alicdn.com/t/font_1635479_m8o2ir6mitf.js" defer></script>
    <script src="<?php $this->options->themeUrl('assets/js/jquery.min.js') ?>" defer></script>
</head>
<body class="is-preload">
<!-- Wrapper -->
<div id="wrapper">
    <!-- Header -->
    <header id="header">
        <h1><a href="<?php echo htmlspecialchars($this->options->siteUrl()) ?>"><strong><?php echo htmlspecialchars($this->options->zmkiabout()) ?></strong> <?php echo htmlspecialchars($this->options->zmkiabouts()) ?></a></h1>
        <nav>
            <ul>
                <li><a type="button" id="fullscreen" class="btn btn-default visible-lg visible-md" alt="切换全屏"><svg class="icon-zmki zmki_dh zmki_wap" aria-hidden="true"><use xlink:href="#icon-zmki-ziyuan-copy"></use></svg></a></li>
                <li><a href="#footer" class="icon solid fa-info-circle">关于</a></li>
            </ul>
        </nav>
    </header>
    <!-- Main -->
    <div id="main">
        <?php while ($this->next()): ?>
        <article class="thumb img-area">
            <a class="image my-photo" alt="loading" href="<?php echo htmlspecialchars($this->fields->img() . $this->options->zmki_sy()) ?>">
                <img class="zmki_px my-photo" onerror="this.src='<?php $this->options->themeUrl('assets/img/20200212-fcf30f3d33625.gif') ?>';this.onerror=null" data-src="<?php echo htmlspecialchars($this->fields->img() . $this->options->zmki_ys()) ?>" />
            </a>
            <h2><?php echo htmlspecialchars($this->title()) ?></h2>
            <p><?php $this->content('Continue Reading...') ?></p>
        </article>
        <?php endwhile; ?>
    </div>
</div>
 				<!-- Footer -->
					<footer id="footer" class="panel">
						<div class="inner split">
							<div class="inner split">
							<div>
								<section>
									<h2>关于<?php $this->options->IndexName() ?></h2>
									<p><?php $this->options->Biglogo () ?></p>
								</section>
								<section>
									<h2>联系我</h2>
									<ul class="icons">								
						<li><a href="<?php $this->options->xxhome()?>" target="_blank" class="icon brands fa-telegram"><span class="label">HOOME</span></a></li>
						<li><a href="<?php $this->options->xxqq()?>"  target="_blank" class="icon brands fa-qq"><span class="label">QQ</span></a></li>
						<li><a href="<?php $this->options->xxweibo()?>"  target="_blank" class="icon brands fa-weibo"><span class="label">weibo</span></a></li>
						<li><a href="<?php $this->options->xxgithub()?> "  target="_blank" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
										</ul>
								</section> 
								<span style="color: #b5b5b5; font-size: 0.8em;">
									<?php $this->options->cnzz()?>
								<p class="copyright">
									&copy; Design HTML UP  Modify BY ZMKI  THEME:<a href="https://www.nullhut.com">Time&nullhut</a>.ICP备案号 :<a href="http://beian.miit.gov.cn/"target="_blank" ><?php $this->options->icp()?></a>
 
					</footer>
          <script type="text/javascript">
// 使用Intersection Observer进行图片加载判断
function observeImages() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        loadImg(entry.target);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 }); // 当图片进入视窗50%时开始加载

  const imgs = document.querySelectorAll('.my-photo');
  imgs.forEach((img) => {
    observer.observe(img);
  });
}

function loadImg(el) {
  if (!el.src) {
    const source = el.dataset.src;
    if (source) { // 增加有效性检查
      el.src = source;
    } else {
      console.error('无效的图片源: ', source);
    }
  }
}

// 节流函数保持不变，因为它在性能优化中起到关键作用
function throttle(fn, mustRun = 10) {
  const timer = null;
  let previous = null;
  return function() {
    const now = new Date();
    const context = this;
    const args = arguments;
    if (!previous) {
      previous = now;
    }
    const remaining = now - previous;
    if (mustRun && remaining >= mustRun) {
      fn.apply(context, args);
      previous = now;
    }
  }
}

// 页面加载时初始化图片观察者
window.onload = observeImages;

// 移除滚动事件的监听，因为Intersection Observer接管了图片加载的控制
// window.onscroll = throttle(checkImgs);
</script>
</div>
		<!-- Scripts -->
			<script src="<?php $this->options->themeUrl('assets/js/jquery.min.js'); ?>"></script>
			<script src="<?php $this->options->themeUrl('assets/js/jquery.poptrox.min.js'); ?>"></script>
			<script src="<?php $this->options->themeUrl('assets/js/browser.min.js'); ?>"></script>
			<script src="<?php $this->options->themeUrl('assets/js/breakpoints.min.js'); ?>"></script>
			<script src="<?php $this->options->themeUrl('assets/js/util.js'); ?>"></script>
			<script src="<?php $this->options->themeUrl('assets/js/main.js'); ?>"></script>
			
	</body>
</html>