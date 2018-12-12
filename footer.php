    </main>
            <footer class="container-fluid fontecatorze paddintop fixed-bottom">           
                <section class="row alinhamentotexto COLORE panel-footer">
                    <div class="col-sm-3 col-md-2 col-lg-2  d-none d-sm-block paddingtop">
                        <img class="d-block w-100" src="img/logomarcafooter.png" alt="logo volare">
                    </div>
                    <div class="col-sm-1 col-md-1 col-lg-1"> </div>
                     <div class="col-sm-4 col-xs-4 col-md-3 col-lg-3 paddingtop text-left">
                    <p>
                        Central de Atendimento:</br>
                        Telefone: (000) 0000-0000</br>
                        E-mail: livrariavolare@mail.com
                    </p>
                     </div>
                    <div class="col-sm-2 col-xs-4 col-md-3 col-lg-3 paddingtop text-left">
                        Forma de Pagamento: <i>PagSeguro</i><br/>
                       <img src="img/pagsegurologo.png" class="d-sm-none d-md-block" title="logomarca" alt="logo livraria volare">
                    </div>
                    <div class="col-sm-2 col-xs-4 col-md-3 col-lg-3 paddingtop text-left">
                    <p >
                        Siga-nos nas redes:<br/>
                        <span style="font-size: 2rem;"><i class="fab fa-facebook"></i></span>&nbsp;
                        <span style="font-size: 2rem;"><i class="fab fa-instagram"></i></span>
                    </p>
                    </div>


                </section>
            </footer>
        <!-- javascript -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="js/jquery.mask.js"></script>
        <script src="js/mask.js" type="text/javascript"></script>
        <script>
		<!-- máscaras -->
            $(document).ready(function () {
                $('.date').mask('00/00/0000');
                $('.time').mask('00:00:00');
                $('.date_time').mask('00/00/0000 00:00:00');
                $('.cep').mask('00000-000');
                //$('.phone').mask('0000-0000');
                $('.phone_with_ddd').mask('(00) 0000-0000');
                $('.phone_us').mask('(000) 000-0000');
                $('.mixed').mask('AAA 000-S0S');
                $('.cpf').mask('000.000.000-00', {reverse: true});
                $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
                $('.money').mask('000.000.000.000.000,00', {reverse: true});
                $('.money2').mask("#.##0,00", {reverse: true});
                $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
                    translation: {
                        'Z': {
                            pattern: /[0-9]/, optional: true
                        }
                    }
                });
                $('.ip_address').mask('099.099.099.099');
                $('.percent').mask('##0,00%', {reverse: true});
                $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
                $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
                $('.fallback').mask("00r00r0000", {
                    translation: {
                        'r': {
                            pattern: /[\/]/,
                            fallback: '/'
                        },
                        placeholder: "__/__/____"
                    }
                });
                $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
            });
		<!--fim das máscaras-->
        </script>
    </body>
</html>
