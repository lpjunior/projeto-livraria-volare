<?php require_once("header.php"); ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/faleconosco.css">

<!------ tags inclusas  ---------->

<!-- CONTACT SECTION -->
<section id="contact" class="parallax-section">
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12">
                    <!-- TITULO -->
                    <div class="wow fadeInUp section-title" data-wow-delay="0.2s">
                         <h2>Fale Conosco</h2>
                         <p>Sua mensagem será encaminhada e respondida com mais agilidade..</p>
                    </div>
               </div>

               <div class="col-md-7 col-sm-10">
                    <!-- FROM DO CONTATO -->
                    <div class="wow fadeInUp" data-wow-delay="0.4s">
                        <form id="contact-form" action="mail.php" method="get">
                              <div class="col-md-6 col-sm-6">
                                   <input type="text" class="form-control" name="name" placeholder="Name" required="">
                              </div>
                              <div class="col-md-6 col-sm-6">
                                   <input type="email" class="form-control" name="email" placeholder="Email" required="">
                              </div>
                              <div class="col-md-12 col-sm-12">
                                   <textarea class="form-control" rows="5" name="message" placeholder="Message" required=""></textarea>
                              </div>
                              <div class="col-md-offset-8 col-md-6 col-sm-offset-6 col-sm-6">
                                   <button id="submit" type="submit" class="form-control" name="submit">Send Message</button>
                              </div>
                        </form>
                    </div>
               </div>

               <div class="col-md-5 col-sm-8">
                    <!-- INFORMAÇOES DO CONTATO -->
                    <div class="wow fadeInUp contact-info" data-wow-delay="0.4s">
                         <div class="section-title">
                              <h2>Informações de Contatos</h2>
                              <p>Horário de atendimento, das 8:30 às 18:00 horas de segunda a sexta-feira, exceto feriados.</p>
                         </div>
                         
                         <p><i class="fa fa-map-marker"></i> 456 New Street 22000, New York City, USA</p>
                         <p><i class="fa fa-comment"></i> <a href="mailto:livrariavolare@mail.com">livrariavolare@mail.com</a></p>
                         <p><i class="fa fa-phone"></i> (000) 0000-0000</p>
                    </div>
               </div>

          </div>
     </div>
</section>

            




<?php require_once("footer.php"); ?>
                    
                    



