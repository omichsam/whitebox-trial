<style type="text/css">
  .card {
  font-size: .875rem;
}

  .carousel .card .card-body {
  
    margin: 0 auto;
    min-height: 100px;
    max-height: 140px !important;
  }

.card {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid #eeeeee;
  border-radius: 0.25rem;
}



.card-header {
  padding: 0.75rem 1.25rem;
  margin-bottom: 0;
  background-color: #fff;
  border-bottom: 1px solid #eeeeee;
}



.card-footer {
  padding: 0.75rem 1.25rem;
  background-color: #fff;
  border-top: 1px solid #eeeeee;
}

.card-footer:last-child {
  border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
}

.card-header-tabs {
  margin-right: -0.625rem;
  margin-bottom: -0.75rem;
  margin-left: -0.625rem;
  border-bottom: 0;
}

.card-header-pills {
  margin-right: -0.625rem;
  margin-left: -0.625rem;
}

.card-img-overlay {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1.25rem;
}

.card-img {
  width: 100%;
  border-radius: calc(0.25rem - 1px);
}

.card-img-top {
  width: 100%;
  border-top-left-radius: calc(0.25rem - 1px);
  border-top-right-radius: calc(0.25rem - 1px);
}

.card-img-bottom {
  width: 100%;
  border-bottom-right-radius: calc(0.25rem - 1px);
  border-bottom-left-radius: calc(0.25rem - 1px);
}

.card-deck {
  display: flex;
  flex-direction: column;
}

.card-deck .card {
  margin-bottom: 15px;
}

@media (min-width: 576px) {
  .card-deck {
    flex-flow: row wrap;
    margin-right: -15px;
    margin-left: -15px;
  }

  .card-deck .card {
    display: flex;
    flex: 1 0 0%;
    flex-direction: column;
    margin-right: 15px;
    margin-bottom: 0;
    margin-left: 15px;
  }
}

.card-group {
  display: flex;
  flex-direction: column;
}

.card-group>.card {
  margin-bottom: 15px;
}

@media (min-width: 576px) {
  .card-group {
    flex-flow: row wrap;
  }

  .card-group>.card {
    flex: 1 0 0%;
    margin-bottom: 0;
  }

  .card-group>.card+.card {
    margin-left: 0;
    border-left: 0;
  }

  .card-group>.card:first-child {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
  }

  .card-group>.card:first-child .card-img-top,
  .card-group>.card:first-child .card-header {
    border-top-right-radius: 0;
  }

  .card-group>.card:first-child .card-img-bottom,
  .card-group>.card:first-child .card-footer {
    border-bottom-right-radius: 0;
  }

  .card-group>.card:last-child {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }

  .card-group>.card:last-child .card-img-top,
  .card-group>.card:last-child .card-header {
    border-top-left-radius: 0;
  }

  .card-group>.card:last-child .card-img-bottom,
  .card-group>.card:last-child .card-footer {
    border-bottom-left-radius: 0;
  }

  .card-group>.card:only-child {
    border-radius: 0.25rem;
  }

  .card-group>.card:only-child .card-img-top,
  .card-group>.card:only-child .card-header {
    border-top-left-radius: 0.25rem;
    border-top-right-radius: 0.25rem;
  }

  .card-group>.card:only-child .card-img-bottom,
  .card-group>.card:only-child .card-footer {
    border-bottom-right-radius: 0.25rem;
    border-bottom-left-radius: 0.25rem;
  }

  .card-group>.card:not(:first-child):not(:last-child):not(:only-child) {
    border-radius: 0;
  }

  .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-img-top,
  .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-img-bottom,
  .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-header,
  .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-footer {
    border-radius: 0;
  }
}

.card-columns .card {
  margin-bottom: 0.75rem;
}

@media (min-width: 576px) {
  .card-columns {
    column-count: 3;
    column-gap: 1.25rem;
  }

  .card-columns .card {
    display: inline-block;
    width: 100%;
  }
}

html[dir="rtl"] .card.card-chart {
  direction: ltr;
}

html[dir="rtl"] .card.card-chart .card-title,
html[dir="rtl"] .card.card-chart .card-category {
  text-align: right;
}

html[dir="rtl"] .card .card-body,
html[dir="rtl"] .card .card-footer {
  direction: rtl;
}




.title,
.title a,
.card-title,
.card-title a,
.info-title,
.info-title a,
.footer-brand,
.footer-brand a,
.footer-big h5,
.footer-big h5 a,
.footer-big h4,
.footer-big h4 a,
.media .media-heading,
.media .media-heading a {
  color: #3C4858;
  text-decoration: none;
}

.card-blog .card-title {
  font-weight: 700;
}


.description,
.card-description,
.footer-big p {
  color: #999999;
}




.card {
  border: 0;
  margin-bottom: 30px;
  margin-top: 30px;
  border-radius: 6px;
  color: #333333;
  background: #fff;
  width: 100%;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
}

.card .card-category:not([class*="text-"]) {
  color: #999999;
}

.card .card-category {
  margin-top: 10px;
}

.card .card-category .material-icons {
  position: relative;
  top: 8px;
  line-height: 0;
}

.card .form-check {
  margin-top: 5px;
}

.card .card-title {
  margin-top: 0.625rem;
}

.card .card-title:last-child {
  margin-bottom: 0;
}

.card.no-shadow .card-header-image,
.card.no-shadow .card-header-image img {
  box-shadow: none !important;
}

.card .card-body,
.card .card-footer {
  padding: 0.9375rem 1.875rem;
}

.card .card-body+.card-footer {
  padding-top: 0rem;
  border: 0;
  border-radius: 6px;
}

.card .card-footer {
  display: flex;
  align-items: center;
  background-color: transparent;
  border: 0;
}

.card .card-footer .author,
.card .card-footer .stats {
  display: inline-flex;
}

.card .card-footer .stats {
  color: #999999;
}

.card .card-footer .stats .material-icons {
  position: relative;
  top: -10px;
  margin-right: 3px;
  margin-left: 3px;
  font-size: 18px;
}

.card.bmd-card-raised {
  box-shadow: 0 8px 10px 1px rgba(0, 0, 0, 0.14), 0 3px 14px 2px rgba(0, 0, 0, 0.12), 0 5px 5px -3px rgba(0, 0, 0, 0.2);
}

@media (min-width: 992px) {
  .card.bmd-card-flat {
    box-shadow: none;
  }
}

.card .card-header {
  border-bottom: none;
  background: transparent;
}

.card .card-header .title {
  color: #fff;
}

.card .card-header .nav-tabs {
  padding: 0;
}

.card .card-header.card-header-image {
  position: relative;
  padding: 0;
  z-index: 1;
  margin-left: 15px;
  margin-right: 15px;
  margin-top: -30px;
  border-radius: 6px;
}

.card .card-header.card-header-image img {
  width: 100%;
  border-radius: 6px;
  pointer-events: none;
  box-shadow: 0 5px 15px -8px rgba(0, 0, 0, 0.24), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
}

.card .card-header.card-header-image .card-title {
  position: absolute;
  bottom: 15px;
  left: 15px;
  color: #fff;
  font-size: 1.125rem;
  text-shadow: 0 2px 5px rgba(33, 33, 33, 0.5);
}

.card .card-header.card-header-image .colored-shadow {
  transform: scale(0.94);
  top: 12px;
  filter: blur(12px);
  position: absolute;
  width: 100%;
  height: 100%;
  background-size: cover;
  z-index: -1;
  transition: opacity .45s;
  opacity: 0;
}

.card .card-header.card-header-image.no-shadow {
  box-shadow: none;
}

.card .card-header.card-header-image.no-shadow.shadow-normal {
  box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
}

.card .card-header.card-header-image.no-shadow .colored-shadow {
  display: none !important;
}

.card .card-header-primary .card-icon,
.card .card-header-primary .card-text,
.card .card-header-primary:not(.card-header-icon):not(.card-header-text),
.card.bg-primary,
.card.card-rotate.bg-primary .front,
.card.card-rotate.bg-primary .back {
  background: linear-gradient(60deg, #ab47bc, #8e24aa);
}

.card .card-header-info .card-icon,
.card .card-header-info .card-text,
.card .card-header-info:not(.card-header-icon):not(.card-header-text),
.card.bg-info,
.card.card-rotate.bg-info .front,
.card.card-rotate.bg-info .back {
  background: linear-gradient(60deg, #26c6da, #00acc1);
}

.card .card-header-success .card-icon,
.card .card-header-success .card-text,
.card .card-header-success:not(.card-header-icon):not(.card-header-text),
.card.bg-success,
.card.card-rotate.bg-success .front,
.card.card-rotate.bg-success .back {
  background: linear-gradient(60deg, #66bb6a, #43a047);
}

.card .card-header-warning .card-icon,
.card .card-header-warning .card-text,
.card .card-header-warning:not(.card-header-icon):not(.card-header-text),
.card.bg-warning,
.card.card-rotate.bg-warning .front,
.card.card-rotate.bg-warning .back {
  background: linear-gradient(60deg, #ffa726, #fb8c00);
}

.card .card-header-danger .card-icon,
.card .card-header-danger .card-text,
.card .card-header-danger:not(.card-header-icon):not(.card-header-text),
.card.bg-danger,
.card.card-rotate.bg-danger .front,
.card.card-rotate.bg-danger .back {
  background: linear-gradient(60deg, #ef5350, #e53935);
}

.card .card-header-rose .card-icon,
.card .card-header-rose .card-text,
.card .card-header-rose:not(.card-header-icon):not(.card-header-text),
.card.bg-rose,
.card.card-rotate.bg-rose .front,
.card.card-rotate.bg-rose .back {
  background: linear-gradient(60deg, #ec407a, #d81b60);
}

.card .card-header-primary .card-icon,
.card .card-header-primary:not(.card-header-icon):not(.card-header-text),
.card .card-header-primary .card-text {
  box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);
}

.card .card-header-danger .card-icon,
.card .card-header-danger:not(.card-header-icon):not(.card-header-text),
.card .card-header-danger .card-text {
  box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(244, 67, 54, 0.4);
}

.card .card-header-rose .card-icon,
.card .card-header-rose:not(.card-header-icon):not(.card-header-text),
.card .card-header-rose .card-text {
  box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(233, 30, 99, 0.4);
}

.card .card-header-warning .card-icon,
.card .card-header-warning:not(.card-header-icon):not(.card-header-text),
.card .card-header-warning .card-text {
  box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(255, 152, 0, 0.4);
}

.card .card-header-info .card-icon,
.card .card-header-info:not(.card-header-icon):not(.card-header-text),
.card .card-header-info .card-text {
  box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(0, 188, 212, 0.4);
}

.card .card-header-success .card-icon,
.card .card-header-success:not(.card-header-icon):not(.card-header-text),
.card .card-header-success .card-text {
  box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(76, 175, 80, 0.4);
}

.card [class*="card-header-"],
.card[class*="bg-"] {
  color: #fff;
}

.card [class*="card-header-"] .card-title a,
.card [class*="card-header-"] .card-title,
.card [class*="card-header-"] .icon i,
.card[class*="bg-"] .card-title a,
.card[class*="bg-"] .card-title,
.card[class*="bg-"] .icon i {
  color: #fff;
}

.card [class*="card-header-"] .icon i,
.card[class*="bg-"] .icon i {
  border-color: rgba(255, 255, 255, 0.25);
}

.card [class*="card-header-"] .author a,
.card [class*="card-header-"] .stats,
.card [class*="card-header-"] .card-category,
.card [class*="card-header-"] .card-description,
.card[class*="bg-"] .author a,
.card[class*="bg-"] .stats,
.card[class*="bg-"] .card-category,
.card[class*="bg-"] .card-description {
  color: rgba(255, 255, 255, 0.8);
}

.card [class*="card-header-"] .author a:hover,
.card [class*="card-header-"] .author a:focus,
.card [class*="card-header-"] .author a:active,
.card[class*="bg-"] .author a:hover,
.card[class*="bg-"] .author a:focus,
.card[class*="bg-"] .author a:active {
  color: #fff;
}

.card .author .avatar {
  width: 30px;
  height: 30px;
  overflow: hidden;
  border-radius: 50%;
  margin-right: 5px;
}

.card .author a {
  color: #3C4858;
  text-decoration: none;
}

.card .author a .ripple-container {
  display: none;
}

.card .card-category-social .fa {
  font-size: 24px;
  position: relative;
  margin-top: -4px;
  top: 2px;
  margin-right: 5px;
}

.card .card-category-social .material-icons {
  position: relative;
  top: 5px;
}

.card[class*="bg-"],
.card[class*="bg-"] .card-body {
  border-radius: 6px;
}



.card .card-stats {
  background: transparent;
  display: flex;
}

.card .card-stats .author,
.card .card-stats .stats {
  display: inline-flex;
}

.card {
  box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.14);
}

.card .table tr:first-child td {
  border-top: none;
}

.card .card-title {
  margin-top: 0;
  margin-bottom: 3px;
}

.card .card-body {
  padding: 0.9375rem 20px;
  position: relative;
}

.card .card-body .form-group {
  margin: 8px 0 0;
}

.card .card-header {
  z-index: 3 !important;
}

.card .card-header .card-title {
  margin-bottom: 3px;
}

.card .card-header .card-category {
  margin: 0;
}

.card .card-header.card-header-text {
  display: inline-block;
}

.card .card-header.card-header-text:after {
  content: "";
  display: table;
}

.card .card-header.card-header-icon i,
.card .card-header.card-header-text i {
  width: 33px;
  height: 33px;
  text-align: center;
  line-height: 33px;
}

.card .card-header.card-header-icon .card-title,
.card .card-header.card-header-text .card-title {
  margin-top: 15px;
  color: #3C4858;
}

.card .card-header.card-header-icon h4,
.card .card-header.card-header-text h4 {
  font-weight: 300;
}

.card .card-header.card-header-tabs .nav-tabs {
  background: transparent;
  padding: 0;
}

.card .card-header.card-header-tabs .nav-tabs-title {
  float: left;
  padding: 10px 10px 10px 0;
  line-height: 24px;
}

.card.card-plain .card-header.card-header-icon+.card-body .card-title,
.card.card-plain .card-header.card-header-icon+.card-body .card-category {
  margin-top: -20px;
}

.card .card-actions {
  position: absolute;
  z-index: 1;
  top: -50px;
  width: calc(100% - 30px);
  left: 17px;
  right: 17px;
  text-align: center;
}

.card .card-actions .card-header {
  padding: 0;
  min-height: 160px;
}



.card .card-actions .fix-broken-card {
  position: absolute;
  top: -65px;
}

.card.card-chart .card-footer i:nth-child(1n+2) {
  width: 18px;
  text-align: center;
}

.card.card-chart .card-category {
  margin: 0;
}

.card .card-body+.card-footer,
.card .card-footer {
  padding: 0;
  padding-top: 10px;
  margin: 0 15px 10px;
  border-radius: 0;
  justify-content: space-between;
  align-items: center;
}

.card .card-body+.card-footer h6,
.card .card-footer h6 {
  width: 100%;
}

.card .card-body+.card-footer .stats,
.card .card-footer .stats {
  color: #999999;
  font-size: 12px;
  line-height: 22px;
}

.card .card-body+.card-footer .stats .card-category,
.card .card-footer .stats .card-category {
  padding-top: 7px;
  padding-bottom: 7px;
  margin: 0;
}

.card .card-body+.card-footer .stats .material-icons,
.card .card-footer .stats .material-icons {
  position: relative;
  top: 4px;
  font-size: 16px;
}

.card [class*="card-header-"] {
  margin: 0px 15px 0;
  padding: 0;
  position: relative;
}

.card [class*="card-header-"] .card-title+.card-category {
  color: rgba(255, 255, 255, 0.8);
}

.card [class*="card-header-"] .card-title+.card-category a {
  color: #fff;
}

.card [class*="card-header-"]:not(.card-header-icon):not(.card-header-text):not(.card-header-image) {
  border-radius: 3px;
  margin-top: -20px;
  padding: 15px;
}

.card [class*="card-header-"] .card-icon,
.card [class*="card-header-"] .card-text {
  border-radius: 3px;
  background-color: #999999;
  padding: 15px;
  margin-top: -20px;
  margin-right: 15px;
  float: left;
}

.card [class*="card-header-"] .card-text {
  float: none;
  display: inline-block;
  margin-right: 0;
}

.card [class*="card-header-"] .card-text .card-title {
  color: #fff;
  margin-top: 0;
}

.card [class*="card-header-"] .ct-chart .card-title {
  color: #fff;
}

.card [class*="card-header-"] .ct-chart .card-category {
  margin-bottom: 0;
  color: rgba(255, 255, 255, 0.62);
}

.card [class*="card-header-"] .ct-chart .ct-label {
  color: rgba(255, 255, 255, 0.7);
}

.card [class*="card-header-"] .ct-chart .ct-grid {
  stroke: rgba(255, 255, 255, 0.2);
}

.card [class*="card-header-"] .ct-chart .ct-series-a .ct-point,
.card [class*="card-header-"] .ct-chart .ct-series-a .ct-line,
.card [class*="card-header-"] .ct-chart .ct-series-a .ct-bar,
.card [class*="card-header-"] .ct-chart .ct-series-a .ct-slice-donut {
  stroke: rgba(255, 255, 255, 0.8);
}

.card [class*="card-header-"] .ct-chart .ct-series-a .ct-slice-pie,
.card [class*="card-header-"] .ct-chart .ct-series-a .ct-area {
  fill: rgba(255, 255, 255, 0.4);
}

.card [class*="card-header-"] .ct-chart .ct-series-a .ct-bar {
  stroke-width: 10px;
}

.card [class*="card-header-"] .ct-chart .ct-point {
  stroke-width: 10px;
  stroke-linecap: round;
}

.card [class*="card-header-"] .ct-chart .ct-line {
  fill: none;
  stroke-width: 4px;
}

.card [data-header-animation="true"] {
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0);
  -ms-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
  -webkit-transition: all 300ms cubic-bezier(0.34, 1.61, 0.7, 1);
  -moz-transition: all 300ms cubic-bezier(0.34, 1.61, 0.7, 1);
  -o-transition: all 300ms cubic-bezier(0.34, 1.61, 0.7, 1);
  -ms-transition: all 300ms cubic-bezier(0.34, 1.61, 0.7, 1);
  transition: all 300ms cubic-bezier(0.34, 1.61, 0.7, 1);
}

.card:hover [data-header-animation="true"] {
  -webkit-transform: translate3d(0, -50px, 0);
  -moz-transform: translate3d(0, -50px, 0);
  -o-transform: translate3d(0, -50px, 0);
  -ms-transform: translate3d(0, -50px, 0);
  transform: translate3d(0, -50px, 0);
}

.card .map {
  height: 280px;
  border-radius: 6px;
  margin-top: 15px;
}

.card .map.map-big {
  height: 420px;
}

.card .card-body.table-full-width {
  padding: 0;
}

.card .card-plain .card-header-icon {
  margin-right: 15px !important;
}

.table-sales {
  margin-top: 40px;
}

.iframe-container {
  width: 100%;
}

.iframe-container iframe {
  width: 100%;
  height: 500px;
  border: 0;
  box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
}

.card-wizard .nav.nav-pills .nav-item {
  margin: 0;
}

.card-wizard .nav.nav-pills .nav-item .nav-link {
  padding: 6px 15px !important;
}

.card-wizard .nav-pills:not(.flex-column) .nav-item+.nav-item:not(:first-child) {
  margin-left: 0;
}

.card-wizard .nav-item .nav-link.active,
.card-wizard .nav-item .nav-link:hover,
.card-wizard .nav-item .nav-link:focus {
  background-color: inherit !important;
  box-shadow: none !important;
}

.card-wizard .input-group-text {
  padding: 6px 15px 0px !important;
}

.card-wizard .card-footer {
  border-top: none !important;
}

.card-chart .card-body+.card-footer,
.card-product .card-body+.card-footer {
  border-top: 1px solid #eee;
}

.card-product .price {
  color: inherit;
}

.card-collapse {
  margin-bottom: 15px;
}

.card-collapse .card .card-header a[aria-expanded="true"] {
  color: #e91e63;
}

.card-stats .card-header.card-header-icon,
.card-stats .card-header.card-header-text {
  text-align: right;
}

.card-stats .card-header .card-icon+.card-title,
.card-stats .card-header .card-icon+.card-category {
  padding-top: 10px;
}

.card-stats .card-header.card-header-icon .card-title,
.card-stats .card-header.card-header-text .card-title,
.card-stats .card-header.card-header-icon .card-category,
.card-stats .card-header.card-header-text .card-category {
  margin: 0;
}

.card-stats .card-header .card-category {
  margin-bottom: 0;
  margin-top: 0;
}

.card-stats .card-header .card-category:not([class*="text-"]) {
  color: #999999;
  font-size: 14px;
}

.card-stats .card-header+.card-footer {
  border-top: 1px solid #eee;
  margin-top: 20px;
}

.card-stats .card-header.card-header-icon i {
  font-size: 36px;
  line-height: 56px;
  width: 56px;
  height: 56px;
  text-align: center;
}

.card-stats .card-body {
  text-align: right;
}

.card-profile {
  margin-top: 30px;
  text-align: center;
}

.card-profile .card-avatar {
  margin: -50px auto 0;
  border-radius: 50%;
  overflow: hidden;
  padding: 0;
  box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
}

.card-profile .card-avatar+.card-body {
  margin-top: 15px;
}

.card-profile .card-avatar img {
  width: 100%;
  height: auto;
}

.card-profile .card-body+.card-footer {
  margin-top: -15px;
}



.card-profile.card-plain .card-avatar {
  margin-top: 0;
}

.card-profile .card-header:not([class*="card-header-"]) {
  background: transparent;
}

.card-profile .card-avatar {
  max-width: 130px;
  max-height: 130px;
}

.card-plain {
  background: transparent;
  box-shadow: none;
}

.card-plain .card-header:not(.card-avatar) {
  margin-left: 0;
  margin-right: 0;
}

.card-plain .card-body {
  padding-left: 5px;
  padding-right: 5px;
}

.card-plain .card-header-image {
  margin: 0 !important;
  border-radius: 6px;
}

.card-plain .card-header-image img {
  border-radius: 6px;
}

.card-plain .card-footer {
  padding-left: 5px;
  padding-right: 5px;
  background-color: transparent;
}


  padding-left: 0.25rem !important;
}




  
  .card .form-horizontal .label-on-left,
  .card .form-horizontal .label-on-right {
    padding-left: 15px;
    padding-top: 8px;
  }

  .card .form-horizontal .form-group {
    margin-top: 0px;
  }

  .card .form-horizontal .checkbox-radios {
    padding-bottom: 15px;
  }

  .card .form-horizontal .checkbox-radios .checkbox:first-child,
  .card .form-horizontal .checkbox-radios .radio:first-child {
    margin-top: 0;
  }

  .card .form-horizontal .checkbox-inline {
    margin-top: 0;
  }
.card{
  max-height: 140px !important;
}
.divfields{
  min-height: 80px;
  border: 1px solid #ccc;
  border-radius: 10px;
  margin-top: -12px;
  font-weight: bolder;
}
.not_seen{
  min-height: 80px;
  border: 1px solid #fff !important;
  border-radius: 10px;
  margin-top: -12px;
}
.covered{
  background: #eaa3a3;
}
.completed{
   background: #eaa3a3;
}
.lesson{
  background: url('Huduma_WhiteBox/study.png');
  background-size: contain;
  background-position: center;
  background-repeat: no-repeat;
}
.prevailholders{
  min-height: 100px;
  margin-top: 2px;
  border: 1px solid #ccc;
  border-radius: 10px;
  font-size: 29px;
  font-weight: bolder;
}
.prevailarrows{
min-height: 100px;
  margin-top: 2px;
  background: url(e_learning/images/arrow.png);
  background-size: contain;
  background-position: center;
  background-repeat: no-repeat;
}
</style>
<?php 
include "../../connect.php";
$my_id=mysqli_real_escape_string($con,base64_decode($_POST['my_id']));
$get_elerning=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$my_id'") or die(mysqli_error($con));
$geter=mysqli_fetch_assoc($get_elerning);
if($geter){
$users_id=$geter['id'];
}else{
$$users_id="";    
}
$checkExistone=mysqli_query($con,"SELECT * FROM curriculum_tests_done WHERE user_id='$users_id' AND unit_id='1'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExistone)!=0){

$findunitone="covered";
    $unit1="covered";

  }else{
$unitone="";

    $findunitone="";
  }
$checkExistone=mysqli_query($con,"SELECT * FROM  curriculum_test_answers WHERE test_id='2'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExistone)!=0){


    $findunitwo="covered";

  }else{
$unitone="";

    $findunitwo="covered";
  }
if($findunitone && $findunitwo){
  $unitone="";

    $findunitwo="";

}
#get moduele 2



$scored=0;
$total_scores=0;
$total_questions=0;
for($a=1;$a<=7;$a++){
  $unit_id=$a;

$getresuslts=mysqli_query($con,"SELECT * FROM  curriculum_tests_done WHERE unit_id='$unit_id' and user_id='$users_id'") or die(mysqli_error($con));
$getusertest=mysqli_fetch_assoc($getresuslts);
if($getusertest){

  $marks=$getusertest['test_score'];
  $total_scores=$total_scores+$marks;
  $questions=$getusertest['questions'];
  $testresults=$marks."/".$questions;
  $total_questions=$total_questions+$questions;
  


}else{

}

if($marks>=0 && $questions>0){
$testresults=$marks."/".$questions;
}else{
$testresults="";
}


if($total_scores){
$scored=number_format($total_scores/$total_questions*100,1);
$not_scored=$scored."%";
}else{
$not_scored="";
}


}

$mod = mysqli_query($con,"SELECT * FROM curriculum_units Where status='active'");
$modulen = mysqli_num_rows($mod);

?>

<div class="container-fluid animated fadeInLeftBig">
          <div class="row">
            <div class="col-lg-3  col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <!--<i class="material-icons">content_copy</i>-->
                    <i class=" fa fa-line-chart"></i>
                  </div>
                  <p class="card-category categoryh1">Scores</p>
                  <h3 class="card-title count_holder"><?php echo $not_scored?>
                    
                  </h3>
                </div>
                <div class="card-footer">
                
                  <div class="stats">
                    </div>
                 <button class="btn moredeteilsbtn btn-primary theme_bg" role="tests" style="float: right;">Open..<i class="fa fa-long-arrow-right arrow1" aria-hidden="true"></i></button>
                 
                </div>
              </div>
            </div>
            <div class="col-lg-3   col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <!--<i class="material-icons">store</i>-->
                    <i class="fa fa-book fa 5X"></i>
                  </div>
                  <p class="card-category categoryh1">Modules</p>
                  <h3 class="card-title count_holder"><?php echo $modulen?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  </div>

                 <button class="btn moredeteilsbtn btn-primary theme_bg" role="curriculum" style="float: right;">Open..<i class="fa fa-long-arrow-right arrow1" aria-hidden="true"></i></button>
                </div>
              </div>
            </div>
            <div class="col-lg-3  col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-comment"></i>
                  </div>
                  <p class="card-category categoryh1">Feeback</p>
                  <h3 class="card-title count_holder"></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  </div>

                <!-- <button class="btn moredeteilsbtn btn-primary theme_bg" role="events" style="float: right;">Open..<i class="fa fa-long-arrow-right arrow1" aria-hidden="true"></i></button>-->
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6  col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-comments"></i>
                  </div>
                  <p class="card-category categoryh1">Communications</p>
                  <h3 class="card-title count_holder"></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  </div>

                <button class="btn moredeteilsbtn btn-primary theme_bg" role="chats" style="float: right;">Open..<i class="fa fa-long-arrow-right arrow1" aria-hidden="true"></i></button>
                </div>
              </div>
            </div>
          </div>
           <div class="row">
          <div class="col-sm-12 col-xs-12" style="text-align:center;text-transform: uppercase;">MY LEARNING JOURNEY</div>









          <div class="row mobile_hidden">

            <?php
$module1="completed";
$module2="completed";
$module3="";
$module4="";
$module5="";
$module6="";
$module7="";


for($a=1;$a<=7;$a++){
  $unit_id=$a;



$sqlxp="SELECT * FROM  curriculum_test where type='feedback' and unit_id='$unit_id'";

    $query_runxpz=mysqli_query($con,$sqlxp) or die($query_runxpz."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxpz)){
$test_id=$row['id'];


    }

$contentb="";
if($a==1){
$checkexams=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$users_id' AND unit_id='$unit_id' and test_id='1'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkexams)>=1){

$contentb="completed";
  }else{

$checkexam=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$users_id' AND unit_id='$unit_id' and test_id='$test_id'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkexam)>=1){

$contentb="completed";

}else{



   $contentb="";
  }
}
}elseif($a==3){
$checkexams=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$users_id' AND unit_id='$unit_id' and test_id='4'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkexams)>=1){

$contentb="completed";
  }else{

$checkexam=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$users_id' AND unit_id='$unit_id' and test_id='5'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkexam)>=1){

$contentb="completed";

}else{



   $contentb="";
  }
}
}else{
 $checkexams=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$users_id' AND unit_id='$unit_id' and test_id='$test_id'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkexams)>=1){

$contentb="completed";
  }else{
   $contentb="";
  } 
}




    
if($a==1){
  $module1=$contentb;

}else if($a==2){


if($contentb){

  $module2=$contentb;
  $contentb=$contentb;
}else{

}


  }else if($a==3){
    if($contentb){
    $module1=$contentb;
    $module2=$contentb;
    $module3=$contentb;

  }else{

  }



    }else if($a==4){
if($contentb){

      $module2=$contentb;
      $module1=$contentb;
      $module4=$contentb;
      $module3=$contentb;

}else{

}


      }else if($a==5){

if($contentb){

        $module5=$contentb;
        $module2=$contentb;
      $module1=$contentb;
      $module4=$contentb;
      $module3=$contentb;
}else{

}
        }else if($a==6){
          if($contentb){
          $module6=$contentb;
          $module5=$contentb;
        $module2=$contentb;
      $module1=$contentb;
      $module4=$contentb;
      $module3=$contentb;
    }else{

    }
          }else if($a==7){
            if($contentb){
            $module7=$contentb;
            $module6=$contentb;
          $module5=$contentb;
        $module2=$contentb;
      $module1=$contentb;
      $module4=$contentb;
      $module3=$contentb;
}else{
  
}

          }else{

          }


}










            $b=8;
            for($a=0;$a<=8;$a++){
              
              ?>
              <div class="row">
                 <div class="col-sm-2 col-xs-2"></div>
              <?php
               
              for($x=0;$x<=8;$x++){
                
                if($x<$b){
                  $filed="not_seen";
                }else{
                  $filed="";
                }
                if($x==$b){
                  if($x==8 || $x==0){
                     $v="";
                $publicb="not_seen";

                  }else{


                  

                 $v="module ".$b;
                $publicb=${"module$b"};

                  
                   /* if($unit1 && $publicb=="module1"){
                       $publicb=$unit1;
                      $n=$b+2;
                      if($n==$x){
                       
                        $publicb="lesson";
                      }else{
                     
                      }


                    }else{

                    }
                    */
                  }
                 

                 // $caverd="covered";
                
                }else{
                  $f=$b-1;
                if($x==$f){
                 
                 

                 // $caverd="covered";
                
                }else{
                 $v="";
                 //$coverage="";
                }

                }
                


if($x==8){
 $v="";
 $publicb="not_seen";
}else{

}



            //echo $unit.$x;

              ?>
               <div class="col-sm-1 <?php echo  $publicb." ".$caverd?> <?php echo $filed?> col-xs-1 divfields"><?php echo $v?></div>
                  <?php
            }
            ?>
          </div>
            <?php
            $b=$b-1;
          }
            ?>


          </div>


<div class="col-sm-12 desktop_hidden col-xs-12">
  <?php
   $g=7;
  for($f=1;$f<15;$f++){
   
    if($f % 2 != 0){ 
      $publicb=${"module$g"};
      
    ?>
<div class="col-sm-12 col-xs-12 prevailholders <?php echo $publicb?>"><?php echo "Module ".$g?></div>
    <?php
  }else{
    $g=$g-1;
    if($g<1){

    }else{
    ?>
    <div class="col-sm-12 col-xs-12 prevailarrows"></div>
    <?php
  }
  }
}

  ?>
</div>



        </div>
        </div>

    <script type="text/javascript">
      $(document).ready(function(){

      var my_id=$("#user_email").val();
      $(".moredeteilsbtn").click(function(){
        var role=$(this).attr('role');
        $.post("e_learning/"+role+"/"+role+".php",{my_id:my_id},function(data){
    $("#learning_area").html(data)
      })
      })
    })
    </script>
     
