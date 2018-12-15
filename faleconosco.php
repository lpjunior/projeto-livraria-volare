<?php
$app->get('/faleConosco', function ($request, $response, $args) {
?>
<!-- CONTACT SECTION -->
<section id="contact" class="parallax-section">
     <div class="container col-md-6 col-lg-6">
          <div class="row pt-4">

               <div class="col-md-7 col-sm-10">
                    <!-- FROM DO CONTATO -->
                    <h1 class="fontevinteecinco">&nbsp;&nbsp;&nbsp;&nbsp;Fale conosco</h1>

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
                              <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button type="submit" class="btn COLORE " name="btn-enviar" onclick="return validarSenha()">Entrar</button>
                                </div>
                            </div>
                        </form>

               </div>

               <div class="col-md-5 col-sm-8">

                    <div class="wow fadeInUp contact-info">
                         <div class="section-title">
                              <h2 class="fontevinteecinco">Informações de Contato</h2><br/>
                              <p>Horário de atendimento, das 8:30 às 18:00 horas de segunda a sexta-feira, exceto feriados.</p>
                         </div>

                         <p><i class="fas fa-map-marker-alt"></i> endereço xxxx xxxx</p>
                         <p><i class="fas fa-envelope-square"></i> <a href="mailto:livrariavolare@mail.com">livrariavolare@mail.com</a></p>
                         <p><i class="fas fa-phone-square"></i> (000) 0000-0000</p>
                    </div>
               </div>

          </div>
     </div>
</section>
<?php }); ?>
