
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-blue panel-widget ">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"></use></svg>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large"><?php echo $this->db->get("pesan")->num_rows(); ?></div>
                        <div class="text-muted">Surat Dibuat</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-teal panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large"><?php echo $this->db->get("pengguna")->num_rows(); ?></div>
                        <div class="text-muted">User Terdaftar</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-orange panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large"><?php echo $this->db->get("jabatan")->num_rows(); ?></div>
                        <div class="text-muted">Jabatan</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-red panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large"><?php echo $this->db->get("dinas")->num_rows(); ?></div>
                        <div class="text-muted">Dinas</div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default chat">
                <div class="panel-heading" id="accordion"><svg class="glyph stroked sound on"><use xlink:href="#stroked-sound-on"/></svg> Pemberitahuan</div>

                <div class="panel-body">
                    <ul>
                        <li class="left clearfix">
								<span class="chat-img pull-left">
									<img src="https://placeholdit.imgix.net/~text?txtsize=15&bg=30a5ff&txtclr=ffffff&txt=Pesan%20Baru&w=80&h=80" alt="User Avatar" class="img-circle">
								</span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">John Doe</strong> <small class="text-muted">32 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc. Vivamus luctus convallis mauris, eu gravida tortor aliquam ultricies.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix">
								<span class="chat-img pull-right">
									<img src="https://placeholdit.imgix.net/~text?txtsize=15&bg=5f6468&txtclr=ffffff&txt=Disposisi%20Baru&w=80&h=80" alt="User Avatar" class="img-circle">
								</span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="pull-left primary-font">Jane Doe</strong> <small class="text-muted">6 mins ago</small>
                                </div>
                                <p>
                                    Mauris dignissim porta enim, sed commodo sem blandit non. Ut scelerisque sapien eu mauris faucibus ultrices. Nulla ac odio nisl. Proin est metus, interdum scelerisque quam eu, eleifend pretium nunc. Suspendisse finibus auctor lectus, eu interdum sapien.
                                </p>
                            </div>
                        </li>
                        <li class="left clearfix">
								<span class="chat-img pull-left">
									<img src="https://placeholdit.imgix.net/~text?txtsize=15&bg=30a5ff&txtclr=ffffff&txt=Pesan%20Baru&w=80&h=80" alt="User Avatar" class="img-circle">
								</span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">John Doe</strong> <small class="text-muted">32 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc. Vivamus luctus convallis mauris, eu gravida tortor aliquam ultricies.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="panel-footer">
<!--                    <div class="input-group">-->
<!--                        <input id="btn-input" type="text" class="form-control input-md" placeholder="Type your message here...">-->
<!--                        <span class="input-group-btn">-->
<!--								<button class="btn btn-success btn-md" id="btn-chat">Send</button>-->
<!--							</span>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </div>

<!--    <div class="row">-->
<!--        <div class="col-lg-12">-->
<!--            <div class="panel panel-default">-->
<!--                <div class="panel-heading">Grafik Pembuatan Surat</div>-->
<!--                <div class="panel-body">-->
<!--                    <div class="canvas-wrapper">-->
<!--                        <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div><!--/.row-->

</div>	<!--/.main-->

