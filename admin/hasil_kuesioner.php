<?php
include "modul/koneksi.php";
$sql="SELECT * FROM  tbl_kuesioner where id_user='$_GET[id]'";
$res=mysql_query($sql);
$r=mysql_fetch_array($res);
// echo $r['no_1'];
?>
<table width="100%" >
                      <tr>
                        <td width="1%">1.</td>
                        <td><label>Apakah Anda pernah bekerja ketika sedang studi di Institut Teknologi Indonesia</label></td>
                      </tr>
                      <tr>
                        <td colspan="2"><input type="radio" id="no1t" name="no_1" value="Ya" <?php if($r['no_1']=='Ya'){echo "checked";} ?>>Ya&nbsp;<input type="radio" name="no_1" value="Tidak" id="no1f" <?php if($r['no_1']=='Tidak'){echo "checked";} ?>>Tidak</td>
                      </tr>
                      <tr>
                        <td width="1%">2.</td>
                        <td><label>Apakah Jenis Pekerjaan Tersebut?</label></td>
                      </tr>
                      <tr>
                        <td colspan="2"><input type="text" class="form-control bg1" name="no_2" value="<?=$r[no_2]?>" ></td>
                      </tr>
                      <tr>
                        <td width="1%">3.</td>
                        <td><label>Apakah Anda saat ini tetap meneruskan usaha tersebut?</label></td>
                      </tr>
                      <tr>
                        <td colspan="2"><input type="radio" class="bg1" name="no_3" value="Ya" <?php if($r['no_3']=='Ya'){echo "checked";} ?>>Ya&nbsp;<input type="radio" class="bg1" name="no_3" value="Tidak" <?php if($r['no_3']=='Tidak'){echo "checked";} ?>>Tidak</td>
                      </tr>
                      <tr>
                        <td width="1%">4.</td>
                        <td><label>Apakah Anda aktif mencari pekerjaan pada tahun akhir ketika studi?</label></td>
                      </tr>
                      <tr>
                        <td colspan="2"><input type="radio"  name="no_4" value="Ya" <?php if($r['no_4']=='Ya'){echo "checked";} ?>>Ya&nbsp;<input type="radio"  name="no_4" value="Tidak" <?php if($r['no_4']=='Tidak'){echo "checked";} ?>>Tidak</td>
                      </tr>
                      <tr>
                        <td width="1%">5.</td>
                        <td><label>Darimana Anda memperoleh informasi kesempatan pekerjaan?</label></td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <table>
                            <tr>
                              <td>
                                <input type="radio" name="no_5" value="Media CDC – ITI ( Mading, Website / Milist )" <?php if($r['no_5']=='Media CDC – ITI ( Mading, Website / Milist )'){echo "checked";} ?>>
                              </td>
                              <td>Media CDC – ITI ( Mading, Website / Milist )</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_5" value="Bursa kerja di Perguruan Tinggi Lain" <?php if($r['no_5']=='Bursa kerja di Perguruan Tinggi Lain'){echo "checked";} ?>>
                              </td>
                              <td>Bursa kerja di Perguruan Tinggi Lain</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_5" value="Iklan di media" <?php if($r['no_5']=='Iklan di media'){echo "checked";} ?>
                              </td>
                              <td>Iklan di media</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_5" value="Keluarga/Teman/Kenalan" <?php if($r['no_5']=='Keluarga/Teman/Kenalan'){echo "checked";} ?>
                              </td>
                              <td>Keluarga/Teman/Kenalan</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_5" value="Pendekatan Perusahaan" <?php if($r['no_5']=='Pendekatan Perusahaan'){echo "checked";} ?>
                              </td>
                              <td>Pendekatan Perusahaan</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_5" value="Perusahaan Melakukan Pendekatan" <?php if($r['no_5']=='Perusahaan Melakukan Pendekatan'){echo "checked";} ?>
                              </td>
                              <td>Perusahaan Melakukan Pendekatan</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_5" value="Internet" <?php if($r['no_5']=='Internet'){echo "checked";} ?>
                              </td>
                              <td>Internet</td>
                            </tr>
                          </table>
                        </td>
                      </tr>

                      <tr>
                        <td width="1%">6.</td>
                        <td><label>Apakah jenis pekerjaan yang Anda minati / harapkan ketika mencari pekerjaan?</label></td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <table>
                            <tr>
                              <td>
                                <input type="radio" name="no_6" value="Manufaktur">
                              </td>
                              <td>Manufaktur</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_6" value="Industri Kimia / Petrokimia">
                              </td>
                              <td>Industri Kimia / Petrokimia</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_6" value="Industri makanan">
                              </td>
                              <td>Industri makanan</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_6" value="Industri Tekstil">
                              </td>
                              <td>Industri Tekstil</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_6" value="Perbankan">
                              </td>
                              <td>Perbankan</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_6" value="Keuangan">
                              </td>
                              <td>Keuangan</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_6" value="Jasa">
                              </td>
                              <td>Jasa</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_6" value="Konsultas Teknik">
                              </td>
                              <td>Konsultan Tenik</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_6" value="Marketing">
                              </td>
                              <td>Marketing</td>
                            </tr>
                            <tr>
                              <td>
                                <input type="radio" name="no_6" value="Pendidikan">
                              </td>
                              <td>Pendidikan</td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td >7.</td>
                        <td><label>Apakah Nama Tempat Anda Bekerja?</label>
                        <br><input type="text" name="no_7" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <td >8.</td>
                        <td><label>Alamat Perusahaan tempat anda bekerja</label>
                        <br><textarea  name="no_8" class="form-control"></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td >9.</td>
                        <td><label>No.Tlp Perusahaan tempat anda bekerja</label>
                        <br><input type="number" name="no_9" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <td >10.</td>
                        <td><label>Apakah bidang utama perusahaan tersebut?</label>
                        <br><input type="text" name="no_10" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <td >11.</td>
                        <td><label>Posisi Jabatan Anda?</label>
                        <br><input type="text" name="no_11" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <td >12.</td>
                        <td><label>Deskripsi perusahaan anda</label>
                        <br><textarea  name="no_12" class="form-control"></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td >13.</td>
                        <td><label>Apakah keahlian yang terutama dituntut dalam jabatan / posisi Anda diatas? </label>
                        <br><input type="radio" name="no_13" value="Komunikasi Teknis"><label>Kompetensi Teknis</label>
                        <br><input type="radio" name="no_13" value="Komunikasi Intepersonal" ><label>Komunikasi Intepersonal</label>
                        <br><input type="radio" name="no_13" value="Kemampuan Presentasi" ><label>Kemampuan Presentasi</label>
                        </td>
                      </tr>
                      <tr>
                        <td >14.</td>
                        <td><label>Apakah hambatan yang terutama Anda rasakan dalam pekerjaan tersebut?</label>
                        <br><input type="radio" name="no_14" value="Komunikasi Teknis">Kompetensi Teknis
                        <br><input type="radio" name="no_14" value="Komunikasi Intepersonal" >Komunikasi Intepersonal
                        <br><input type="radio" name="no_14" value="Kemampuan Presentasi" >Kemampuan Presentasi
                        </td>
                      </tr>
                      <tr>
                        <td >15.</td>
                        <td><label>Berapakah Rata-rata pendapatan anda</label>
                        <br><input type="radio" name="no_15" value="UMR">UMR
                        <br><input type="radio" name="no_15" value="UMR s.d 8jt" >UMR < 8jt
                        <br><input type="radio" name="no_15" value="8 jt s.d 15 jt" >8 jt s.d 15 jt
                        <br><input type="radio" name="no_15" value="Gaji > 15 jt" > > 15 jt
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <button type="submit" class="btn btn-md btn-info">Submit</button>
                        </td>
                      </tr>
                    </table>