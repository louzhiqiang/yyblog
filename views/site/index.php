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
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/screen.css">

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
                      <a href="#blog-list" aria-controls="blog-list" role="tab" data-toggle="tab">首页</a>
                  </li>
                  <li role="presentation">
                      <a href="#blog-content" aria-controls="blog-content" role="tab" data-toggle="tab">归档</a>
                  </li>
                  <li role="presentation">
                      <a href="#about-me" aria-controls="about-me" role="tab" data-toggle="tab">关于我</a>
                  </li>
              </ul>
          </div>
      </div>
    </nav>
    <section class="content-wrap">
        <div class="container">
            <div class="row tab-content">
                <main role="tabpanel" class="col-md-8 main-content tab-pane active" id="blog-list">
                	<?php foreach ($blogList as $blog):?>
                    <article class="post">
                        <div class="post-head">
                            <h2 class="post-title"><?php echo $blog['title'];?></h2>
                            <div class="post-meta">
                                <span class="author">
                                    作者：<a href="javascript:;"><?php echo $blog['author'];?></a>
                                </span>
                                 •
                                <time class="post-data" datatime="<?php echo date("Y年m月d日 H时i分");?>" title="<?php echo date("Y年m月d日 H时i分");?>"><?php echo date("Y年m月d日")?></time>
                            </div>
                            <div class="featured-media">
                                <img src="<?php echo $blog['imgUrl'] ? $blog['imgUrl'] : "/assets/img/1.jpg"?>">
                            </div>
                            <div class="post-content">
                                <p><?php echo mb_substr(strip_tags($blog['content']), 0, 230)."……"?></p>
                            </div>
                            <div class="post-permalink clearfix">
                                <a href="/index.php?r=article&id=<?php echo $blog['id'];?>" class="btn btn-default pull-left">阅读全文</a>
                            </div>
                            <footer class="post-footer clearfix">
                                <div class="pull-left tag-list">
                                    <i class="fa fa-folder-open-o"></i>
                                </div>
                                <div class="pull-right share"></div>
                            </footer>
                        </div>
                    </article>
                    <?php endforeach;?>
                    <nav class="pagination clearfix" role="navigation">
                    	<?php if ($page > 1):?>
                    	<a href="/?tagName=<?php echo $tagName;?>&page=<?php echo $page-1;?>" class="pull-left">
                            <i class="icon-chevron-left"></i>
                        </a>
                        <?php endif;?>
                        <span class="page-number pull-left">第 <?php echo $page;?> 页 ⁄ 共 <?php echo $totalPage;?> 页</span>
                        <?php if($totalPage > $page): ?>
                        <a href="/?tagName=<?php echo $tagName;?>&page=<?php echo $page+1;?>" class="pull-right">
                            <i class="icon-chevron-right"></i>
                        </a>
                        <?php endif;?>
                    </nav>
                </main>
                <!-- 归档目录 -->
                <main role="tabpanel" class="col-md-8 main-content tab-pane" id="blog-content">
                    <article class="on-file">
                    	<?php foreach ($articleList as $article):?>
                        <dl class="dl-horizontal">
                            <dt><?php echo date("Y年m月d日", $article['createTime']);?></dt>
                            <dd><a href="/index.php?r=article&id=<?php echo $article['id'];?>"><?php echo $article['title'];?></a></dd>
                        </dl>
                        <?php endforeach;?>
                    </article>
                </main>
                <main role="tabpanel" class="col-md-8 main-content tab-pane" id="about-me">
                    <article class="aboutMe">
                        <h2 class="aboutMe-title">关于博主</h2>
                        <div class="featured-media">
                            <img src="/assets/img/figure.jpg">
                        </div>
                        <h4>简介</h4>
                        <div class="aboutMe-content">
                          <p>本博客主要的内容为自己学习及实践前端开发中的所学所悟。所有博客内容均为原创，如有转载，请标明出处！初来乍到，愿各位同仁积极交流并提出宝贵意见。</p>
                            <dl class="dl-horizontal aboutMe-dl">
                            <dt>个人信息</dt>
                            <dd>包红梅，女，90后，程序员</dd>
                          </dl>
                          <dl class="dl-horizontal aboutMe-dl">
                            <dt>技能</dt>
                            <dd>精通HTML，Javascript，CSS等web前端开发需要的各项技术；</dd>
                            <dd>熟练掌握HTML5，CSS3常用标签及方法；</dd>
                            <dd>熟练使用JQuery，requirejs，less等工具，精通原生javascript；</dd>
                            <dd>有较强的前端模块化和组件化思想，追求前端工程化，可维护性</dd> 
                            <dd>熟练linux开发环境，对于PHP，NodeJS也比较熟悉</dd>
                          </dl>
                        </div>
                        <h4>更多信息</h4>
                        <div class="aboutMe-content">
                          <p>如果你想了解更多或想要与我交流，可扫一扫下方二维码，添加QQ，与我取得联系。</p>
                            <img src="/assets/img/code.jpg">
                        </div>
                        <footer class="post-footer clearfix">
                            <div class="pull-left tag-list">
                                <i class="fa fa-folder-open-o"></i>
                            </div>
                            <div class="pull-right share"></div>
                        </footer>
                    </article>
                </main>
                <aside class="col-md-4">
                    <div class="widget">
                        <h4 class="title">博文列表</h4>
                        <div class="content">
                            <ul class="list-unstyled">
                            	<?php foreach ($blogArticleList as $blog):?>
                                <li class="list-top">
                                    <a href="/index.php?r=article&id=<?php echo $blog['id'];?>" title="<?php echo $blog['title'];?>"><?php echo $blog['title'];?></a>
                                </li>
                                <?php endforeach;?>
                            </ul> 
                        </div>
                    </div>
                    <div class="widget">
                        <h4 class="title">博客标签云</h4>
                        <div class="content tag-cloud">
                        	 <?php foreach ($tagList as $tag):?>
                             	<a <?php if($tagName==$tag):?>href="/"<?php else:?>href="/?tagName=<?php echo $tag;?>"<?php endif;?> <?php if($tagName==$tag):?>class="active"<?php endif;?>>
                             	<?php echo $tag;?>
                             	<?php if($tagName==$tag):?><i class="icon-remove"></i><?php endif;?>
                             	</a>
                             	
                             <?php endforeach;?>
                        </div>
                    </div>
                </aside>
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
  </body>
</html>
