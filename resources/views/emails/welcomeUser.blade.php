<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bienvenido a Pakal</title>
    <!-- Designed by https://github.com/kaytcat -->
    <!-- Robot header image designed by Freepik.com -->

    <style type="text/css">
        @import url(http://fonts.googleapis.com/css?family=Droid+Sans);

        /* Take care of image borders and formatting */

        img {
            max-width: 600px;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        a {
            text-decoration: none;
            border: 0;
            outline: none;
            color: #bbbbbb;
        }

        a img {
            border: none;
        }

        /* General styling */

        td,
        h1,
        h2,
        h3 {
            font-family: Helvetica, Arial, sans-serif;
            font-weight: 400;
        }

        td {
            text-align: center;
        }

        body {
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none;
            width: 100%;
            height: 100%;
            color: #37302d;
            background: #ffffff;
            font-size: 16px;
        }

        table {
            border-collapse: collapse !important;
        }

        .headline {
            color: #ffffff;
            font-size: 36px;
        }

        .force-full-width {
            width: 100% !important;
        }
    </style>

    <style type="text/css" media="screen">
        @media screen {

            /*Thanks Outlook 2013! http://goo.gl/XLxpyl*/
            td,
            h1,
            h2,
            h3 {
                font-family: 'Droid Sans', 'Helvetica Neue', 'Arial', 'sans-serif' !important;
            }
        }
    </style>

    <style type="text/css" media="only screen and (max-width: 480px)">
        /* Mobile styles */
        @media only screen and (max-width: 480px) {

            table[class="w320"] {
                width: 320px !important;
            }


        }
    </style>
</head>

<body class="body" style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none"
    bgcolor="#ffffff">
    <table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%">
        <tr>
            <td align="center" valign="top" bgcolor="#ffffff" width="100%">
                <center>
                    <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" width="600" class="w320">
                        <tr>
                            <td align="center" valign="top">

                                <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" width="100%"
                                    style="margin:0 auto;">
                                    <tr>
                                        <td style="font-size: 30px; text-align:center;">
                                            <br>
                                            Hola {{$request->name}}
                                            <br>
                                            <br>
                                        </td>
                                    </tr>
                                </table>

                                <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" width="100%"
                                    bgcolor="#4dbfbf">
                                    <tr>
                                        <td>
                                            <br>
                                            <img src="http://pakal.site/img/logo.png"
                                                style="max-width: 100px">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="headline">
                                            Bienvenido!
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                            <center>
                                                <table style="margin: 0 auto;" cellpadding="0" cellspacing="0"
                                                    width="60%">
                                                    <tr>
                                                        <td style="color:#187272;">
                                                            <br>
                                                            Queremos brindarte una forma segura, ecol??gica y econ??mica
                                                            para viajar
                                                            <br>
                                                            <br>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </center>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <!--[if mso]>
                        <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:50px;v-text-anchor:middle;width:200px;" arcsize="8%" stroke="f" fillcolor="#178f8f">
                          <w:anchorlock/>
                          <center>
                        <![endif]-->
                                                <a href='{{ env('APP_URL') }}'
                                                    style="background-color:#178f8f;border-radius:4px;color:#ffffff;display:inline-block;font-family:Helvetica, Arial, sans-serif;font-size:16px;font-weight:bold;line-height:50px;text-align:center;text-decoration:none;width:200px;-webkit-text-size-adjust:none;">
                                                    Iniciar Sesi??n
                                                </a>
                                                <!--[if mso]>
                          </center>
                        </v:roundrect>
                      <![endif]-->
                                            </div>
                                            <br>
                                            <br>
                                        </td>
                                    </tr>
                                </table>

                                <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" width="100%"
                                    bgcolor="#0076B6">
                                    <tr>
                                        <td style="background-color:#0076B6;" class="headline">
                                            <br>
                                            Version Beta
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="https://cdn.iconscout.com/icon/free/png-512/whatsapp-48-243981.png"
                                                style="max-width: 75px">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                            <center>
                                                <table style="margin: 0 auto;" cellpadding="0" cellspacing="0"
                                                    width="60%">
                                                    <tr>
                                                        <td style="color:#ffffff;">
                                                            <br>
                                                            Gracias por participar en el Lanzamiento de Pakal, tus
                                                            opiniones y comentarios no ayudar??n a mejorar tu
                                                            satisfacci??n y experiencia.
                                                            <br><br>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </center>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <!--[if mso]>
                        <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:50px;v-text-anchor:middle;width:200px;" arcsize="8%" stroke="f" fillcolor="#999B9E">
                          <w:anchorlock/>
                          <center>
                        <![endif]-->
                                                <a href="https://chat.whatsapp.com/Eh7djB0MtJkDyc70yviJW8"
                                                    style="background-color:#F9CE3F;border-radius:4px;color:#ffffff;display:inline-block;font-family: Helvetica, Arial, sans-serif;font-size:16px;font-weight:bold;line-height:50px;text-align:center;text-decoration:none;width:200px;-webkit-text-size-adjust:none;">
                                                    Contactar.
                                                </a>
                                                <!--[if mso]>
                          </center>
                        </v:roundrect>
                      <![endif]-->
                                            </div>
                                            <br>
                                            <br>
                                        </td>
                                    </tr>
                                </table>

                                <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" class="force-full-width"
                                    bgcolor="#414141" style="margin: 0 auto">
                                    <tr>
                                        <td style="background-color:#414141;">
                                            <br>
                                            <br>
                                            <img src="https://www.filepicker.io/api/file/R4VBTe2UQeGdAlM7KDc4"
                                                alt="google+">
                                            <img src="https://www.filepicker.io/api/file/cvmSPOdlRaWQZnKFnBGt"
                                                alt="facebook">
                                            <img src="https://www.filepicker.io/api/file/Gvu32apSQDqLMb40pvYe"
                                                alt="twitter">
                                            <br>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="color:#bbbbbb; font-size:12px;">
                                            <a href="#">View in browser</a> | <a href="#">Unsubscribe</a> | <a
                                                href="#">Contact</a>
                                            <br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="color:#bbbbbb; font-size:12px;">
                                            ?? 2020 All Rights Reserved
                                            <br>
                                            <br>
                                        </td>
                                    </tr>
                                </table>





                            </td>
                        </tr>
                    </table>
                </center>
            </td>
        </tr>
    </table>
</body>

</html>