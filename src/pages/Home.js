import 'lightgallery/css/lightgallery.css';
import 'lightgallery/css/lg-zoom.css';
import 'lightgallery/css/lg-thumbnail.css';

import LightGallery from 'lightgallery/react';
import lgThumbnail from 'lightgallery/plugins/thumbnail';
import lgZoom from 'lightgallery/plugins/zoom';
import lgPager from 'lightgallery/plugins/pager';

export default function Home() {
  return <>
    <section className="d-flex flex-column" style={{ height: "100vh", background: "rgba(0, 0, 0, 0.7) url(assets/images/bg-3-1920x1000.jpg)", backgroundBlendMode: "darken", backgroundPosition: "center", backgroundSize: "cover" }}>
      <nav class="navbar navbar-expand-lg bg-transparent px-1 px-lg-4 py-4">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">
            <img src="assets/images/logo-302x44.png" alt="" width="151" height="22" />
          </a>
          <ul className="navbar-nav">
            <li className="nav-item active">
              <a className="nav-link text-white" href="/">Inicio</a>
            </li>
          </ul>
        </div>
      </nav>
      <div className="d-flex flex-grow-1 align-items-center">
        <div className="d-flex flex-column gap-3 px-5">
          <a target="_blank" rel="noreferrer" href="https://www.instagram.com/refugio_lifestyle">
            <i className="icon icon-meta mdi mdi-instagram text-white"></i>
          </a>
          <a target="_blank" rel="noreferrer" href="https://www.youtube.com/@refugiolifestyle">
            <i className="icon icon-meta mdi mdi-youtube-play text-white"></i>
          </a>
          <a target="_blank" rel="noreferrer" href="https://open.spotify.com/show/2YJ3HxRyWu6e36K5f29j20">
            <i className="icon icon-meta mdi mdi-spotify text-white"></i>
          </a>
        </div>
        <div className="flex-grow-1">
          <h1 className="text-white">Culto Refúgio</h1>
          <h4 className="text-white">Domingo, 20 hrs</h4>
          <div className="line"></div>
        </div>
      </div>
    </section>
    <footer className="section footer-2">
      <div className="container">
        <div className="row row-40">
          <div className="col-md-6 col-lg-4">
            <a className="footer-logo" href="/">
              <img src="assets/images/favicon-light.png" alt="" style={{ height: "65px" }} />
            </a>
            <p>Somos uma rede de células pertencente a Igreja do Evangelho Quadrangular - Sede do Pará, que funciona de modo orgânico e relacional, objetivando despertar cada crente a fim de que possa desenvolver suas habilidades ministeriais e funcionar dentro do Reino.</p>
          </div>
          <div className="col-md-6 col-lg-3 offset-lg-1">
            <h5 className="title">Galeria</h5>
            <LightGallery
              speed={500}
              plugins={[lgThumbnail, lgZoom, lgPager]}>
              <a
                href="assets/images/galeria/galeria (1).jpeg">
                <img className="m-2" src="assets/images/galeria/galeria (1).jpeg" alt="" width="84" height="84" />
              </a>
              <a
                href="assets/images/galeria/galeria (2).jpeg">
                <img className="m-2" src="assets/images/galeria/galeria (2).jpeg" alt="" width="84" height="84" />
              </a>
              <a
                href="assets/images/galeria/galeria (3).jpeg">
                <img className="m-2" src="assets/images/galeria/galeria (3).jpeg" alt="" width="84" height="84" />
              </a>
              <a
                href="assets/images/galeria/galeria (4).jpeg">
                <img className="m-2" src="assets/images/galeria/galeria (4).jpeg" alt="" width="84" height="84" />
              </a>
              <a
                href="assets/images/galeria/galeria (5).jpeg">
                <img className="m-2" src="assets/images/galeria/galeria (5).jpeg" alt="" width="84" height="84" />
              </a>
              <a
                href="assets/images/galeria/galeria (6).jpeg">
                <img className="m-2" src="assets/images/galeria/galeria (6).jpeg" alt="" width="84" height="84" />
              </a>
              <a
                className="d-none"
                href="assets/images/galeria/galeria (7).jpeg">
                <img src="assets/images/galeria/galeria (7).jpeg" alt="" />
              </a>
              <a
                className="d-none"
                href="assets/images/galeria/galeria (8).jpeg">
                <img src="assets/images/galeria/galeria (8).jpeg" alt="" />
              </a>
              <a
                className="d-none"
                href="assets/images/galeria/galeria (9).jpeg">
                <img src="assets/images/galeria/galeria (9).jpeg" alt="" />
              </a>
              <a
                className="d-none"
                href="assets/images/galeria/galeria (10).jpeg">
                <img src="assets/images/galeria/galeria (10).jpeg" alt="" />
              </a>
              <a
                className="d-none"
                href="assets/images/galeria/galeria (11).jpeg">
                <img src="assets/images/galeria/galeria (11).jpeg" alt="" />
              </a>
              <a
                className="d-none"
                href="assets/images/galeria/galeria (12).jpeg">
                <img src="assets/images/galeria/galeria (12).jpeg" alt="" />
              </a>
              <a
                className="d-none"
                href="assets/images/galeria/galeria (13).jpeg">
                <img src="assets/images/galeria/galeria (13).jpeg" alt="" />
              </a>
              <a
                className="d-none"
                href="assets/images/galeria/galeria (14).jpeg">
                <img src="assets/images/galeria/galeria (14).jpeg" alt="" />
              </a>
              <a
                className="d-none"
                href="assets/images/galeria/galeria (15).jpeg">
                <img src="assets/images/galeria/galeria (15).jpeg" alt="" />
              </a>
              <a
                className="d-none"
                href="assets/images/galeria/galeria (16).jpeg">
                <img src="assets/images/galeria/galeria (16).jpeg" alt="" />
              </a>
              <a
                className="d-none"
                href="assets/images/galeria/galeria (17).jpeg">
                <img src="assets/images/galeria/galeria (17).jpeg" alt="" />
              </a>
              <a
                className="d-none"
                href="assets/images/galeria/galeria (18).jpeg">
                <img src="assets/images/galeria/galeria (18).jpeg" alt="" />
              </a>
            </LightGallery>
          </div>
          <div className="col-md-6 col-lg-3 offset-lg-1">
            <h5 className="text-white title">Localização</h5>
            <ul className="contact-box">
              <li>
                <div className="unit unit-horizontal unit-spacing-xxs">
                  <div className="unit-left"><span className="icon mdi mdi-map-marker accent-icon"></span></div>
                  <div className="unit-body">
                    <a target="_blank"
                      rel="noreferrer"
                      href="https://www.google.com/maps/place/Ref%C3%BAgio+Lifestyle/@-1.4315824,-48.4724636,15z/data=!4m5!3m4!1s0x0:0x6766cd6cdc1d7e5a!8m2!3d-1.4315733!4d-48.4724574">
                      Tv. Timbó, 1244, <br className="veil reveal-lg-inline" />
                      Pedreira, Belém - PA, Brasil
                    </a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <p className="rights">
          &copy; <span className="copyright-year"></span> <span>Refúgio Lifestyle</span>. Todos os direitos reservados.
        </p>
      </div>
    </footer>
  </>
}
