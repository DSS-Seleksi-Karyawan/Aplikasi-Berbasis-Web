<?php
    error_reporting(0);
    $pelamar= new Pelamar();
    $kriteria= new Kriteria();

    $qr_pl = $pelamar->GetData("");
    $qr_k = $kriteria->GetData("");
?>
<div class="span9">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="#" class="btn-box big span4"><i class="icon-key"></i><b><?php echo $qr_pl->rowCount(); ?></b>
                                        <p class="text-muted">
                                            Pelamar</p>
                                    </a><a href="#" class="btn-box big span4"><i class="icon-inbox"></i><b><?php echo $qr_k->rowCount(); ?></b>
                                        <p class="text-muted">
                                            Kriteria</p>
                                    </a>
                                </div>
                            </div>
                            <!--/#btn-controls-->
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->

