<footer class="footer_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer_logo">
                    <a href="{{ url('/') }}" class="footer_logo_iner">
                        <img alt="Logo KawanPeduli" width="400" src="{{ asset('frontend/img/footer_logo.png') }}">
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="single_footer_part">
                    <a href="{{ '#' }}">
                        <h4>Tentang Kami</h4>
                    </a>
                    <p class="text-justify">
                        Kami Adalah Tim SixteenCoder dari Proyek Akhir Mata Kuliah PSW II Di Institut Teknologi Del,
                        Terimakasih Telah Mengunjungi Website Ini, Semoga Website Ini Dapat Bermanfaat Bagi Banyak Orang.<br>
                        <b>#UntukIndonesiaBebasCorona</b>
                    </p>
                    <div class="footer_icon social_icon">
                        <div class="addthis_inline_follow_toolbox"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="single_footer_part">
                    <h4>Info Kontak</h4>
                    <p class="text-justify">Alamat :<br>Jl. P.I. Del, Sitoluama, Lagu Boti, Kabupaten Toba Samosir, Sumatera Utara 22381.</p>
                    <p class="text-justify">Telepon : +62 813 1577 9968</p>
                    <p class="text-justify">Email : sixteencoder@gmail.com</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="single_footer_part">
                    <h4>Website Terkait</h4>
                    <ul class="list-unstyled">
                        <li><a href="https://www.del.ac.id/" target="_blank">Institut Teknologi Del</a></li>
                        <li><a href="https://covid19.go.id/" target="_blank">Gugus Tugas Percepatan Penanganan COVID-19 Di Indonesia</a></li>
                        <li><a href="https://kawalcorona.com/" target="_blank">Kawal Corona</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="single_footer_part">
                    <h4>Berlangganan</h4>
                    <p class="text-justify">
                        Daftarkan Email Anda Agar Tetap Mendapatkan Notifikasi Dari Kami
                    </p>
                    <div id="mc_embed_signup">
                        <form method="POST" action="{{ route('mail.store') }}" class="subscribe_form relative mail_part">
                            @csrf
                            <input type="text" name="email" id="newsletter-form-email" class="@error('email') is-invalid @enderror placeholder hide-on-focus mb-3" placeholder="Masukkan Email" value="{{ old('email') }}">
                            @error('email')
                            <div class="info">
                                {{ $message }}
                            </div>
                            @enderror
                            <button name="submit" id="newsletter-submit" type="submit" class="email_icon newsletter-submit button-contactForm"><i class="far fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
                <div class="single_footer_part">
                    <p class="text-justify">
                        Tolong Berikan Feedback Pada Kami Dengan Mengisi Kuesioner Yang Kami Sediakan
                    </p>
                    <div id="mc_embed_signup">
                        <a href="{{ route('questionnaire.create') }}" class="btn btn-block btn-danger">Isi Kuesioner</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright_text text-center">
                    <P>
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());

                        </script> All Rights Reserved | This Website Is Made With <i class="fa fa-heart" aria-hidden="true"></i> By <a href="#">SixteenCoder - IT Del</a>
                    </P>
                </div>
            </div>
        </div>
    </div>
</footer>

@yield('modal')

<script src="{{ asset('frontend/js/jquery-1.12.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('frontend/js/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/js/masonry.pkgd.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('frontend/js/contact.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/js/mail-script.js') }}"></script>
<script src="{{ asset('backend/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.10.21/af-2.3.5/b-1.6.2/b-colvis-1.6.2/b-flash-1.6.2/b-html5-1.6.2/b-print-1.6.2/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.2/r-2.2.5/rg-1.1.2/rr-1.2.7/sc-2.0.2/sp-1.1.1/sl-1.3.1/datatables.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ec34ba61a2f83cb"></script>
@yield('script')
</body>
</html>
