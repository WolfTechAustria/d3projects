<div id="ModalAddHours" class="modal">
                    <div class="modal-content">
                        <span id="close" class="close">&times;</span>
                        <p>Stunden anlegen</p>
                        Projektnummer:
                        <input id="ip_projectID" value="<?=$projectID?>" class="wt_form-control" readonly>
                        <br>
                        Mitarbeiter:
                        
                                            <select class="wt_form-control" id="employeelist">
                                            <?php
                                              $query3 = "SELECT * FROM tb_employees";
                                              $result3 = mysqli_query($db, $query3);
                                              while($row3 = mysqli_fetch_array($result3))
                                              {
                                                 ?>
                                                  <option value = "<?php echo $row3[1] ?>"><?php echo $row3[2] ?>  <?php echo $row3[3] ?></option>';
                                                 <?php
                                              }
                                              ?>
                                            </select>
                        <br>
                        Datum:
                        <input id="ip_HoursDate" class="wt_form-control" type="date" value="<?php echo date('Y-m-d'); ?>" required>
                        <br>
                        Beginn:
                        <input id="ip_HoursStart" class="wt_form-control" type="time" required>
                        <br>
                        Ende:
                        <input id="ip_HoursEnd" class="wt_form-control" type="time" required>
                        <br>
                        Stunden:
                        <input id="ip_Hours" class="wt_form-control"  readonly>
                        <br>
                        Arbeitsbeschreibung:
                        <textarea id="ta_description" class="wt_form-control" maxlength="300" style="height: 150px;"></textarea>
                        <br><br>
                        <button class="btn btn-success" id="btn_saveHours">speichern</button> <button class="btn btn-danger" id="btn_abort">abbrechen</button>

                    </div>
                </div>



                