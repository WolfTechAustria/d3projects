<div id="ModalAddArticle" class="modal">
    <div class="modal-content">
        <span id="close" class="close">&times;</span>
        <p>Artikel anlegen</p>
        <br><br>
        <section class="section">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <!-- Text -->
                            Artikelnummer:
                            <?php
                                            $sql = mysqli_query($db, "SELECT * FROM tb_numberrange");


                                            while ($row = mysqli_fetch_array($sql)) {
                                                echo '<input id="ip_articleID" type="text" value="'.$row['articleID'].'" class="wt_form-control" readonly>';
                                            }

                            ?>
                            <br>

                            <!-- Text -->
                            Artikelname
                            <div>
                                <input id="ip_articlename" type="text" class="wt_form-control">
                            </div>
                            <br>

                            <!-- Text -->
                            Beschreibung
                            <div >
                            <textarea id="ta_description" class="wt_form-control" maxlength="300" style="height: 150px;"></textarea>
                            </div>
                            <br>
                            <!-- Text -->
                            Einheit
                            <div >
                            <textarea id="ta_unit" class="wt_form-control" maxlength="300" style="height: 150px;"></textarea>
                            </div>
                            <br>

                            <!-- Text -->
                            Einkaufspreis netto
                            <div >
                                <input id="ip_eknet" type="text" class="wt_form-control" required="">
                            </div>
                            <br>

                            <!-- Text -->
                            Verkaufspreis netto
                            <div >
                                <input id="ip_vknet" type="text" class="wt_form-control">
                            </div>
                            <br>

                            <!-- Text -->
                            Steuer [%]
                            <div >
                                <input id="ip_tax"  type="text" class="wt_form-control" value="20">
                            </div>
                            <br>

                        </div>
                    </div>
                </div>
            </section>
        <button class="btn btn-success" id="btn_saveArticle">speichern</button> <button class="btn btn-danger" id="btn_abort">abbrechen</button>
    </div>
</div>



                