<div id="ModalAddArticleToProject" class="modal">
                    <div class="modal-content">
                    <span id="close" class="close">&times;</span>
                    <p>Artikel auswählen</p>
                    Projektnummer:
                        <input id="ip_projectID" value="<?=$projectID?>" class="wt_form-control" readonly>
                        <br>
                    Datum:
                    <input id="ip_projectArticleDate" class="wt_form-control" type="date" value="<?php echo date('Y-m-d'); ?>" required>
                    <br>
                    Artikel:
                        <input id="ip_article" list="articleList" class="wt_form-control" placeholder="hier zur Suche eingeben...">
                        <datalist id="articleList">
                            <select>
                                <?php  
                                $query="SELECT articleID, name from tb_article";
                                foreach($db->query($query) as $row){
                                    echo '<option data-value='.$row["articleID"].' value="'.$row["name"].'">'.$row["articleID"].'</option>';
                                }
                                ?>
                            </select>
                        </datalist>
                        <br>
                    Anzahl:
                        <input id="ip_amount" class="wt_form-control" required>
                        <br>
                    Bemerkung:
                        <textarea id="ta_addArticleDescription" class="wt_form-control" maxlength="300" style="height: 150px;"></textarea>
                    <br><br>
                    <button class="btn btn-success" id="btn_saveAddArticleToProject">speichern</button> <button class="btn btn-danger" id="btn_abortAddArticle">abbrechen</button>

                    </div>
</div>