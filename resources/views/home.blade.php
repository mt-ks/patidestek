@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 35px">
        <div class="row">


            <div class="col s12 m3">
                <div class="card nice_shadow">
                    <div class="card-content d-flex">
                        <img src="https://i.hizliresim.com/Gkjy95.jpg" alt="" class="main_avatar">
                        <div style="margin-left: 18px;margin-top: auto;margin-bottom: auto">
                            <h5>Mehmet</h5>
                            <label for="">mehmetbeyhz@gmail.com</label> <br>
                            <label for="">Onur Puanı : 100</label>
                        </div>
                    </div>
                </div>

                <div class="card nice_shadow">
                    <div class="card-content">
                        <label>Filtreler</label>
                        <input type="text" placeholder="Arama mentni...">

                        <select class="browser-default">
                            <option value="">Şehir seçiniz...</option>
                        </select>

                        <select class="browser-default mt-1">
                            <option value="">Mahalle seçiniz...</option>
                        </select>

                        <select class="browser-default mt-1">
                            <option value="">Köpek</option>
                        </select>

                        <button class="btn blue mt-1" style="width: 100%">ARA</button>

                    </div>
                </div>
            </div>

            <div class="col s12 m7">

                <div class="col s12 m12">
                    <div class="card nice_shadow">
                       <div class="card-content">
                           <textarea name="" id="" cols="30" rows="10" style="height: 100px"></textarea>
                           <button type="submit" class="btn blue mt-1">PAYLAŞ</button>
                       </div>
                    </div>
                </div>


            @for($i = 0; $i < 50; $i++)
                    <div class="col s12 m12">
                        <div class="card nice_shadow">
                            <div class="card-content">
                                <div class="post-owner d-flex">
                                    <img
                                        src="https://post.medicalnewstoday.com/wp-content/uploads/sites/3/2020/02/322868_1100-800x825.jpg"
                                        class="radius-full" width="50px" alt="">
                                    <div style="margin:auto 0 auto 8px;">
                                        Alice Harikalar Diyarında <br>
                                        <label>18:48 10-12-2020</label>
                                    </div>
                                </div>
                                <div class="post-content mt-1" style="font-size: 20px">
                                    <p>Merhaba arkadaşlar köpeğim afrika kabilesi Himbalar tarafından kaçırılmıştır, kırmızı renkteki
                                        köpeğimizi tanrı zannediyorlar. Görenler 0530 123 123
                                    </p>
                                </div>
                                <div class="action-area mt-1">
                                    <a>Beğen</a>
                                    <a style="margin-left: 10px;">Yorum yap</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <div class="col s12 m2">
                <div class="d-flex" style="height: 450px;background: #433efe;margin-top: 10px;border-radius: 10px">
                    <div style="margin: auto; color: white; font-size: 25px">
                        REKLAM
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
