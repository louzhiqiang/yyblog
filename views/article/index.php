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
                      <a href="#blog-detail" aria-controls="blog-detail" role="tab" data-toggle="tab">详情</a>
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
                    <article class="post">
                        <div class="post-head">
                            <h2 class="post-title"><?php echo $detail['title'];?></h2>
                            <div class="post-meta">
                                <span class="author">
                                    作者：<a href="javascript:;"><?php echo $detail['author'];?></a>
                                </span>
                                 •
                                <time class="post-data" datatime="<?php echo date("Y年m月d日 H时i分", $detail['createTime']);?>" title="<?php echo date("Y年m月d日 H时i分", $detail['createTime']);?>"><?php echo date("Y年m月d日", $detail['createTime']);?></time>
                            </div>
                            <div class="featured-media">
                                <img src="<?php echo $detail['imgUrl'];?>">
                            </div>
                            <div class="post-content">
                                <p><?php echo $detail['content'];?></p>
                            </div>
                            <footer class="post-footer clearfix">
                                <div class="pull-left tag-list">
                                    <i class="fa fa-folder-open-o"></i>
                                </div>
                                <div class="pull-right share"></div>
                            </footer>
                        </div>
                    </article>
                    <div class="message-board">
                        <span class="msg-num">
                            <strong><?php echo count($messageList);?></strong>条评论
                        </span>
                        <div class="message">
                        	<?php if (count($messageList)):?>
                            <ul>
                            	<?php foreach ($messageList as $message):?>
                                <li>
                                    <div class="l-msg-head">
                                        <img src="<?php echo ($message['userPhoto'] ? $message['userPhoto'] : "/assets/img/de-face.jpg")?>">
                                    </div>
                                    <div class="l-msg-box">
                                        <a href="javascript:;" class="msg-user"><?php echo $message['userName']?></a>
                                        <p class="msg-content"><?php echo $message['content'];?></p>
                                        <div class="msg-footer clearfix">
                                            <time class="pull-left"><?php echo date("Y年m月d日 H:i", $message['createTime']);?></time>
                                            <div class="pull-right">
                                                <a href="javascript:;" class="reply" toid="<?php echo $message['id'];?>"><i class="icon-reply"></i>回复(<?php echo $message['recvCount'];?>)</a>
                                                <a href="javascript:;" class="acc" messageid="<?php echo $message['id'];?>"><i class="icon-thumbs-up"></i>顶(<?php echo $message['acc'];?>)</a>
                                                <a href="javascript:;" class="ref" messageid="<?php echo $message['id'];?>"><i class="icon-thumbs-down"></i>踩(<?php echo $message['ref'];?>)</a>
                                            </div>
                                        </div>
                                        <?php if(isset($message['list']) && count($message['list'])):?>
                                        <ol class="list-unstyled">
                                        	<?php foreach ($message['list'] as $messageChild):?>
                                            <li>
                                                <div class="l-msg-box">
                                                    <a href="javascript:;" class="msg-user"><?php echo $messageChild['userName'];?> <span>回复</span> <?php echo $messageChild['toUserName'];?></a>
                                                    <p class="msg-content"><?php echo $messageChild['content'];?></p>
                                                    <div class="msg-footer clearfix">
                                                        <time class="pull-left"><?php echo date("Y年m月d日 H:i", $messageChild['createTime']);?></time>
                                                        <div class="pull-right">
                                                            <a href="javascript:;" class="reply" toid="<?php echo $messageChild['id'];?>"><i class="icon-reply"></i>回复(<?php echo $messageChild['recvCount'];?>)</a>
                                                            <a href="javascript:;" class="acc" messageid="<?php echo $messageChild['id'];?>"><i class="icon-thumbs-up"></i>顶(<?php echo $messageChild['acc'];?>)</a>
                                                            <a href="javascript:;" class="ref" messageid="<?php echo $messageChild['id'];?>"><i class="icon-thumbs-down"></i>踩(<?php echo $messageChild['ref'];?>)</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php endforeach;?>
                                        </ol>
                                        <?php endif;?>
                                    </div>
                                </li>
                                <?php endforeach;?>
                            </ul>
                            <?php else: ?>
                            	暂无评论
                            <?php endif;?>
                        </div>
                        <div class="leave-message clearfix">
                            <div class="pull-left msg-head">
                                <img src="<?php echo (isset($user['userPhoto']) ? $user['userPhoto'] : "/assets/img/de-face.jpg")?>">
                            </div>
                            <form id="form" onsubmit="return false;">
                                <div class="pull-right msg-text">
                                    <textarea id="text" cols="30" rows="10" class="form-control"></textarea>
                                    <input type="hidden" name="articleId" value="<?php echo $detail['id'];?>">
                                    <input type="hidden" name="toId" value="">
                                    <div class="clearfix expression">
                                        <div class="pull-left exp-left-box">
                                            <img src="/assets/img/face.png" class="face-img">
                                            <div class="exp-box">
                                                <ul class="list-unstyled clearfix">
                                                    <li><img src="/assets/img/face/moren/88_thumb.gif" alt="拜拜"></li>
                                                    <li><img src="/assets/img/face/moren/angrya_thumb.gif" alt="生气"></li>
                                                    <li><img src="/assets/img/face/moren/bad_thumb.gif" alt="差劲"></li>
                                                    <li><img src="/assets/img/face/moren/bba_thumb.gif" alt="撒娇"></li>
                                                    <li><img src="/assets/img/face/moren/bs_thumb.gif" alt="别嘴"></li>
                                                    <li><img src="/assets/img/face/moren/bs2_thumb.gif" alt="鄙视"></li>
                                                    <li><img src="/assets/img/face/moren/bz_thumb.gif" alt="闭嘴"></li>
                                                    <li><img src="/assets/img/face/moren/come_thumb.gif" alt="勾引"></li>
                                                    <li><img src="/assets/img/face/moren/cool_thumb.gif" alt="酷"></li>
                                                    <li><img src="/assets/img/face/moren/crazya_thumb.gif" alt="抓狂"></li>
                                                    <li><img src="/assets/img/face/moren/cry_thumb.gif" alt="衰"></li>
                                                    <li><img src="/assets/img/face/moren/dizzya_thumb.gif" alt="晕"></li>
                                                    <li><img src="/assets/img/face/moren/good_thumb.gif" alt="赞"></li>
                                                    <li><img src="/assets/img/face/moren/gza_thumb.gif" alt="鼓掌"></li>
                                                    <li><img src="/assets/img/face/moren/heia_thumb.gif" alt="偷笑"></li>
                                                    <li><img src="/assets/img/face/moren/kbsa_thumb.gif" alt="挖鼻屎"></li>
                                                    <li><img src="/assets/img/face/moren/kl_thumb.gif" alt="可怜"></li>
                                                    <li><img src="/assets/img/face/moren/laugh_thumb.gif" alt="大笑"></li>
                                                    <li><img src="/assets/img/face/moren/mb_thumb.gif" alt="可爱"></li>
                                                    <li><img src="/assets/img/face/moren/money_thumb.gif" alt="钱"></li>
                                                    <li><img src="/assets/img/face/moren/nm_thumb.gif" alt="怒骂"></li>
                                                    <li><img src="/assets/img/face/moren/no_thumb.gif" alt="NO"></li>
                                                    <li><img src="/assets/img/face/moren/o_thumb.gif" alt="拳头"></li>
                                                    <li><img src="/assets/img/face/moren/ok_thumb.gif" alt="OK"></li>
                                                    <li><img src="/assets/img/face/moren/sad_thumb.gif" alt="踩"></li>
                                                    <li><img src="/assets/img/face/moren/sada_thumb.gif" alt="大哭"></li>
                                                    <li><img src="/assets/img/face/moren/sb_thumb.gif" alt="生病"></li>
                                                    <li><img src="/assets/img/face/moren/sk_thumb.gif" alt="思考"></li>
                                                    <li><img src="/assets/img/face/moren/sleepa_thumb.gif" alt="困"></li>
                                                    <li><img src="/assets/img/face/moren/t_thumb.gif" alt="吐"></li>
                                                    <li><img src="/assets/img/face/moren/tootha_thumb.gif" alt="嘻笑"></li>
                                                    <li><img src="/assets/img/face/moren/ws_thumb.gif" alt="握手"></li>
                                                    <li><img src="/assets/img/face/moren/ye_thumb.gif" alt="yeah"></li>
                                                    <li><img src="/assets/img/face/moren/yw_thumb.gif" alt="疑问"></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <button class="btn-default pull-right">回复</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- <nav class="pagination clearfix" role="navigation">
                        <span class="page-number pull-left">第 1 页 ⁄ 共 5 页</span>
                        <a href="javascript:;" class="pull-right">
                            <i class="glyphicon glyphicon-chevron-right"></i>
                        </a>
                    </nav> -->
                </main>
                <!-- 归档文件 -->
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
                            <dd>熟练掌握HTML5，CSS3常用标签及方法；（简单列出来几个你熟悉的效果，但是不是很简单的那种效果）</dd>
                            <dd>熟练使用JQuery，requirejs，less等工具，掌握原生javascript； (列出来一些你熟悉的但是上档次的效果或者前端框架)</dd>
                          </dl>
                        </div>
                        <h4>更多信息</h4>
                        <div class="aboutMe-content">
                          <p>如果你想了解更多或想要与我交流，可扫一扫下方二维码，与我取得联系。</p>
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
                        <h4 class="title">我的标签</h4>
                        <div class="content tag-cloud">
                             <?php foreach ($tagList as $tag):?>
                             	<a href="/site?tagName=<?php echo $tag;?>#blog-content"><?php echo $tag;?></a>
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
    <script src="/assets/js/main.js"></script>
  </body>
</html>
