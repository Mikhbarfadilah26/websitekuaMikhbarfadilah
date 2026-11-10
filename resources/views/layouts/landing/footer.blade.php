<footer class="footer-section" id="kontak">

    <div class="footer-main">

        <div class="container">

            <div class="row">

                {{-- =====================================================
                     LOKASI
                ====================================================== --}}
                <div class="col-lg-4 col-md-6 footer-column">

                    <h5 class="footer-heading">
                        LOKASI
                    </h5>

                    <div class="footer-map">

                        <iframe
                            src="https://www.google.com/maps?q=KUA+Karang+Baru+Aceh+Tamiang&output=embed"
                            width="100%"
                            height="250"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>

                    </div>

                </div>


                {{-- =====================================================
                     FANSPAGE
                ====================================================== --}}
                <div class="col-lg-4 col-md-6 footer-column">

                    <h5 class="footer-heading">
                        FANSPAGE
                    </h5>

                    <div class="fanspage-box">

                        <div class="fanspage-content">

                            <i class="fas fa-mosque mosque-icon"></i>

                            <h5>
                                KUA Karang Baru
                            </h5>

                            <p>
                                Kabupaten Aceh Tamiang
                            </p>

                            <div class="social-icons">

                                <a href="#" title="Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>

                                <a href="#" title="Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>

                                <a href="#" title="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>

                                <a href="#" title="YouTube">
                                    <i class="fab fa-youtube"></i>
                                </a>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =====================================================
                     CONTACT US
                ====================================================== --}}
                <div class="col-lg-4 col-md-12 footer-column">

                    <h5 class="footer-heading">
                        CONTACT US
                    </h5>

                    <div class="contact-content">

                        <p class="contact-title">
                            KANTOR URUSAN AGAMA KECAMATAN KARANG BARU
                        </p>

                        <p>
                            <strong>Alamat Kantor :</strong>
                            Jl. Medan–Banda Aceh, Medang Ara,
                            Kec. Karang Baru, Kab. Aceh Tamiang
                        </p>

                        <p>
                            <strong>Telepon :</strong>
                            -
                        </p>

                        <p>
                            <strong>Email :</strong>
                            -
                        </p>

                        <p>
                            <strong>Website :</strong>
                            -
                        </p>

                        <p class="wa-layanan">
                            <strong>WA Layanan KUA Karang Baru</strong>
                            <br>
                            -
                        </p>

                        <div class="contact-social">

                            <a href="#" title="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>

                            <a href="#" title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>

                            <a href="#" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="#" title="YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         COPYRIGHT
    ====================================================== --}}

    <div class="footer-bottom">

        <div class="container">

            <div class="footer-bottom-content">

                <p class="copyright">
                    © {{ date('Y') }} KUA Karang Baru
                </p>

                <p class="copyright">
                    Kabupaten Aceh Tamiang
                </p>

            </div>

        </div>

    </div>

</footer>


<style>

/* =========================================================
   FOOTER UTAMA
========================================================= */

.footer-section {
    background: #343a40;
    color: #fff;
    width: 100%;
    overflow: hidden;
}

.footer-main {
    padding: 35px 0 25px;
}

.footer-column {
    margin-bottom: 25px;
}

.footer-heading {
    color: #fff;
    font-size: 18px;
    font-weight: 700;
    margin: 0 0 15px;
    padding: 0;
}


/* =========================================================
   MAP
========================================================= */

.footer-map {
    width: 100%;
    overflow: hidden;
    border-radius: 3px;
}

.footer-map iframe {
    display: block;
    width: 100%;
    height: 250px;
}


/* =========================================================
   FANSPAGE
========================================================= */

.fanspage-box {
    width: 100%;
}

.fanspage-content {
    text-align: center;
    padding: 5px 10px 0;
}

.mosque-icon {
    display: block;
    font-size: 48px;
    color: #fff;
    margin-bottom: 12px;
}

.fanspage-content h5 {
    color: #fff;
    font-size: 22px;
    font-weight: 700;
    margin: 0 0 5px;
}

.fanspage-content p {
    color: #ddd;
    font-size: 16px;
    margin: 0 0 18px;
}


/* =========================================================
   SOCIAL ICON
========================================================= */

.social-icons,
.contact-social {
    display: flex;
    align-items: center;
    gap: 10px;
}

.social-icons {
    justify-content: center;
}

.social-icons a,
.contact-social a {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: #fff;
    color: #343a40;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: 0.2s;
}

.social-icons a:hover,
.contact-social a:hover {
    background: #f1f1f1;
    color: #0d6efd;
}


/* =========================================================
   CONTACT
========================================================= */

.contact-content {
    color: #eee;
}

.contact-content p {
    font-size: 15px;
    line-height: 1.6;
    margin: 0 0 10px;
}

.contact-content .contact-title {
    color: #fff;
    font-weight: 700;
    font-size: 16px;
    line-height: 1.5;
    margin-bottom: 12px;
}

.contact-content strong {
    color: #fff;
}

.wa-layanan {
    margin-top: 12px !important;
    margin-bottom: 15px !important;
}


/* =========================================================
   FOOTER BOTTOM
========================================================= */

.footer-bottom {
    background: #2c3237;
    padding: 13px 0;
}

.footer-bottom-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
}

.copyright {
    color: #ddd;
    font-size: 13px;
    margin: 0;
}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 991px) {

    .footer-main {
        padding: 30px 0 20px;
    }

    .footer-column {
        margin-bottom: 25px;
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767px) {

    .footer-main {
        padding: 25px 15px 10px;
    }

    .footer-column {
        margin-bottom: 25px;
    }

    .footer-heading {
        font-size: 16px;
        margin-bottom: 10px;
    }

    /* MAP DIPERKECIL */
    .footer-map iframe {
        height: 190px;
    }

    /* FANSPAGE DIPERKECIL */
    .fanspage-content {
        padding: 0;
    }

    .mosque-icon {
        font-size: 38px;
        margin-bottom: 8px;
    }

    .fanspage-content h5 {
        font-size: 19px;
        margin-bottom: 3px;
    }

    .fanspage-content p {
        font-size: 14px;
        margin-bottom: 12px;
    }

    /* ICON SOSIAL LEBIH KECIL */
    .social-icons,
    .contact-social {
        gap: 8px;
    }

    .social-icons a,
    .contact-social a {
        width: 38px;
        height: 38px;
        font-size: 14px;
    }

    /* CONTACT LEBIH RAPAT */
    .contact-content p {
        font-size: 13px;
        line-height: 1.5;
        margin-bottom: 7px;
    }

    .contact-content .contact-title {
        font-size: 14px;
        line-height: 1.4;
        margin-bottom: 9px;
    }

    .wa-layanan {
        margin-top: 8px !important;
        margin-bottom: 10px !important;
    }

    /* COPYRIGHT JADI TENGAH */
    .footer-bottom {
        padding: 10px 15px;
    }

    .footer-bottom-content {
        flex-direction: column;
        justify-content: center;
        gap: 3px;
        text-align: center;
    }

    .copyright {
        font-size: 11px;
    }

}


/* =========================================================
   HP SANGAT KECIL
========================================================= */

@media (max-width: 400px) {

    .footer-main {
        padding: 20px 12px 5px;
    }

    .footer-column {
        margin-bottom: 20px;
    }

    .footer-heading {
        font-size: 15px;
    }

    .footer-map iframe {
        height: 170px;
    }

    .mosque-icon {
        font-size: 34px;
    }

    .fanspage-content h5 {
        font-size: 18px;
    }

    .fanspage-content p {
        font-size: 13px;
    }

    .contact-content p {
        font-size: 12px;
    }

    .contact-content .contact-title {
        font-size: 13px;
    }

    .social-icons a,
    .contact-social a {
        width: 35px;
        height: 35px;
        font-size: 13px;
    }

}

</style>