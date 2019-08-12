    <!DOCTYPE html>

    <html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <title>Termo</title>

        <style>
                .page-break {
                  page-break-after: always;
                }
                .dcet{
                    font-family: Times;
                    font-size: 16px;
                    font-weight: bold;
                    float: right;
                    margin: 12px 40px 0px 10px;
                }
             .titulo-carta{
                 font-family: Arial;
                 font-size: 22px;
                 text-align: center;


            }
                .body{
                    font-family: Arial;
                    font-size: 16px;
                    line-height: 28px;

            }

               .input {

                  /* border: none; /*Retira as bordas do input*/
                   width: 300px;
                   border-bottom: solid 1px #ffffff; /*Coloca borda somente na parte de baixo*/
                }
                .input-data {

                    border-bottom: solid 1px #ffffff; /*Coloca borda somente na parte de baixo*/
                }
                .input-data2 {
                    width: 20px;
                    border-bottom: solid 1px #ffffff; /*Coloca borda somente na parte de baixo*/
                }
                .input-data3 {
                    width: 40px;
                    border-bottom: solid 1px #ffffff; /*Coloca borda somente na parte de baixo*/
                }




        </style>
    </head>

    <body>

                    <div><img src="imagens/uneb.png" alt="logo">
                     <a class="dcet">Departamento de Ciências Exatas e da Terra – Campus I<br>
                         Colegiado de Sistemas de Informação </a></div><br><br>

                        <div class="titulo-carta" >CARTA DE ACEITAÇÃO DE ORIENTAÇÃO</div><br><br>
                    <p class="body" align="justify">Eu, <input  class="input" type="text" name="fname">(nome completo do orientador),professor da Universidade do Estado da Bahia (UNEB) comprometo-me  a orientar o Trabalho	de	Conclusão	de	Curso	com	título	provisório:<br>
                        <input  class="input" type="text" name="fname"> (título provisório do projeto) que	será	executado	pelo(a)	aluno(a)<input  class="input" type="text" name="fname">(nome do aluno(a)).<br><br>

                        Confirmo  que  irei estar disponível de forma regular para orientar o(a) referido(a) aluno até a conclusão deste projeto, seguindo todas as normas definidas nas disciplinas Trabalho de Conclusão de Curso I e II. Desta forma, assino este documento como prova do compromisso assumido.</p>


                    Salvador, <input  class="input-data2" type="text" name="fname">      de  <input  class="input-data" type="text" name="fname"> 	de <input  class="input-data3" type="text" name="fname"><br><br>



                    <br><br>  <input  class="input" type="text" name="fname">
                    <p style="margin-left: 50px">(assinatura do orientador)</p> <br><br>

        e-mail:
            <input  class="input" type="text" name="fname">
                    <p style="margin-left: 100px">(e-mail do orientador)</p><br><br>
                   <!-- <div class="page-break"></div>-->
                </body>


    </html>