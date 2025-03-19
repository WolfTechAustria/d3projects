<div id="ModalAddCustomer" class="modal">
    <div class="modal-content">
        <span id="close" class="close">&times;</span>
        <p>Kunde anlegen</p>
        <br><br>
        <section class="section">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <!-- Text -->
                            Kundennummer:
                            <?php
                                            $sql = mysqli_query($db, "SELECT * FROM tb_numberrange");


                                            while ($row = mysqli_fetch_array($sql)) {
                                                echo '<input id="tb_kundennr" name="tb_kundennr" type="text" value="'.$row['customerID'].'" class="wt_form-control" readonly>';
                                            }

                            ?>
                            <br>

                            <!-- Text -->
                            Firmenname (oder Vor- und Nachname bei Privatkunden)
                            <div>
                                <input id="tb_company" name="tb_company" type="text" placeholder="Firmenname" class="wt_form-control">
                            </div>
                            <br>

                            <!-- Text -->
                            Vorname Ansprechpartner (optional)
                            <div >
                                <input id="tb_firstname" name="tb_firstname" type="text" placeholder="Vorname (optional)" class="wt_form-control" required="">
                            </div>
                            <br>

                            <!-- Text -->
                            Nachname Ansprechpartner (optional)
                            <div >
                                <input id="tb_lastname" name="tb_lastname" type="text" placeholder="Nachname (optional)" class="wt_form-control" required="">
                            </div>
                            <br>

                            <!-- Text -->
                            Telefonnummer
                            <div >
                                <input id="tb_phone" name="tb_phone" type="text" placeholder="z.B.: 0664 / 1234567" class="wt_form-control">
                            </div>
                            <br>

                            <!-- Text -->
                            E-Mail Adresse
                            <div >
                                <input id="tb_email" name="tb_email" type="text" placeholder="z.B.: office@d3-tirol.at" class="wt_form-control">
                            </div>
                            <br>

                        </div>
                        <div class="col">
                            UID Kunde
                            <div >
                                <input id="tb_vatCustomer" name="tb_vatCustomer" type="text" placeholder="UID Nummer Kunde" class="wt_form-control" required="">
                            </div>
                            <br>

                            Straße
                            <div >
                                <input id="tb_street" name="tb_street" type="text" placeholder="Pflichtfeld - bitte ausfüllen" class="wt_form-control">
                            </div>
                            <br>

                            Ort
                            <div >
                                <input id="tb_city" name="tb_city" type="text" placeholder="Pflichtfeld - bitte ausfüllen" class="wt_form-control">
                            </div>
                            <br>

                            PLZ
                            <div>
                                <input id="tb_zip" name="tb_zip" type="text" placeholder="Pflichtfeld - bitte ausfüllen" class="wt_form-control">
                            </div>
                            <br>
                            
                            Land
                            <div>
                                <select id="sb_country" name="sb_country" class="wt_form-control">
                                    <option value="1">ÖSTERREICH</option>
                                    <option value="2">DEUTSCHLAND</option>
                                    <option value="3">SCHWEIZ</option>
                                </select>
                            </div>
                            <br>

                        </div>
                    </div>
                </div>
            </section>
        <button class="btn btn-success" id="btn_saveCustomer">speichern</button> <button class="btn btn-danger" id="btn_abort">abbrechen</button>
    </div>
</div>



                