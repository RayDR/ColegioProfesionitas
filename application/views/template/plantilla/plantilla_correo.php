<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Becas Particulares | Secreataría de Educación Tabasco</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0 " />
</head>
<body style="margin: 0; padding: 0;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%" style="padding-top: 10px">
        <thead>
            <tr>
                <th width="30%" align="center" bgcolor="#9D2449" style="padding: 20px 5px 20px 5px;">
                    <img src="<?= base_url('sources/img/logo_blanco.png') ?>" alt="Secretaría de Educación Tabasco" width="auto" height="auto" style="display: block; max-width: 150px" />
                </th>
                <th width="70%" align="left" bgcolor="#9D2449" style="padding: 20px 0 20px 20px;">
                    <h1 style="display: block; color: white; font-size: 24px">Sistema Electrónico de Becas Particulares</h1>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="center" colspan="2" style="padding: 40px 30px 40px 30px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th colspan="2">
                                <h2 style="display: block; color: black; font-size: 18px;">
                                    <b><?= $saludo ?></b>
                                </h2>
                                <hr>
                                <p style="font-size: 16px; color: grey;">
                                    <?= $contenido ?>
                                </p>
                            </th>
                        </tr>
                    </thead>
                </table>
                </td>
            </tr>
        </tbody>
            <tr> <!-- ACCESO AL SISTEMA -->
                <td align="center" colspan="2" >
                    <a href="<?= $url ?>" style="text-decoration:none;">
                        <p style="font-size: 20px; color: #9D2449; padding: 10px 30px 10px 30px; margin-top: 10px" >
                            <strong>ACCEDER A LA CONSULTA DE RESULTADOS</strong>
                        </p>
                    </a>
                </td>
            </tr>
            <tfoot>
                <tr>
                    <td align="center" colspan="2" bgcolor="#343a40" style="padding: 30px 40px 30px 40px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="color: white;">
                                        © Educación <?php echo date("Y"); ?>
                                </td>
                                <td>
                                    <a href="https://tabasco.gob.mx/aviso-de-privacidad-dtit" style="text-decoration: none; color: #b38e5d;">Aviso de privacidad</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tfoot>
    </table>
</body>
