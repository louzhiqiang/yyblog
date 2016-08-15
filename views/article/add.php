<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>EnyoBao的技术博客</title>

    <!-- Bootstrap -->
    <link rel="shortcut icon" href="http://www.golaravel.com/assets/favicon.ico">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/screen.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--[if IE 7]>
    <link rel="stylesheet" href="./css/font-awesome-ie7.min.css">
    <![endif]-->
  </head>
  <body background-color="#f00">
    <header class="main-header">
      <div class="container">
          <h1>包红梅的技术博客</h1>
          <h4>记录下自己学习的点滴</h4>
      </div>
    </header>
    <nav class="navbar navbar-default main-navigation" role="navigation">
      <div class="container">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
                  <span class="sr-only">Toggle Navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <img src="/assets/img/logo.png">
          </div>
          <div class="collapse navbar-collapse navbar-right" id="main-menu">
              <ul class="nav nav-tabs menu">
                  <li class="active" role="presentation">
                      <a href="#blog-detail" aria-controls="blog-detail" role="tab" data-toggle="tab">添加文章</a>
                  </li>
              </ul>
          </div>
      </div>
    </nav>
    <section class="content-wrap">
        <div class="container">
            <div class="row tab-content">
            	<form action="/index.php?r=article/create" method="post" enctype="multipart/form-data">
            		作者：<input type="text" name="author">
            		标签：<input type="text" name="tag">
            	          图片：<input type="file" name="img">
                   	
            		标题：
                            		<!-- 加载编辑器的容器 -->
                    <script id="title" name="title" type="text/plain">
这里写你的初始化内容
                    </script>
                   	内容：
                            		<!-- 加载编辑器的容器 -->
                    <script id="content" name="content" type="text/plain">
这里写文章内容
                    </script>
                    
                    <!-- 配置文件 -->
                    <script type="text/javascript" src="/assets/ueditor/ueditor.config.js"></script>
                    <!-- 编辑器源码文件 -->
                    <script type="text/javascript" src="/assets/ueditor/ueditor.all.js"></script>
                    <!-- 实例化编辑器 -->
                    <script type="text/javascript">
                        var ue = UE.getEditor('title');
                        var ue = UE.getEditor('content');
                    </script>

                   	<input type="submit" value="提交">
            	</form>
            </div>
        </div>
    </section>
    <footer class="main-footer">
        Designed By EnyoBao in 2006
    </footer>
    <a href="#" id="back-to-top" class="back-to-top">
        <i class="icon-arrow-up"></i>
    </a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/assets/js/jquery-1.12.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/main.js"></script>
  </body>
</html>