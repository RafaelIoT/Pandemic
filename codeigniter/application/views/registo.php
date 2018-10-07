<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Registar </title>
        <link rel="stylesheet" href="http://appserver-01.alunos.di.fc.ul.pt/~asw011/etapa2/codeigniter/assets/css/ola.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
    <div id="blank"></div>
    <div id="header">
        <a id="logo" href="home">Pandemic</a>
        <a id="login" href="login">Login</a>    </div>
        <form id = "cadastro "name="Cadastro"  action="cadastrar" enctype="multipart/form-data" method="POST" onsubmit="return validate()">

        <div id="nome">
            <p class="field"> Nome:</p>
            <input name="nome" type="text" id="targ1" >
        </div>

        <div id="apelido">
            <p class="field"> Apelido: </p>
            <input name="apelido" type="text" id="targ2">
        </div>


        <div id="email">
            <p class="field"> Email: <?php echo '<span>'.$_SESSION["emailErr"].'</span>';?></p>
            <input name="email" type="email" id="targ2">

        </div>

        <p class="field"> Sexo: </p>
        <select id="sexo" name="sexo">
            <option value="deff">Escolha o sexo</option>
            <option value="M">M</option>
            <option value="F">F</option>
            <option value="N">outro</option>
        </select>


        <div id="idade">
            <p class="field"> Data de Nascimento: </p>
            <input name="idade" type="date" id="targ4">
        </div>


        <div id="pais">
            <p class="field"> País: </p>
                <select name="pais" id="pais" onchange="yesnoCheck(this);">
                    <option value="defP" selected>Selecionar País</option>
                    <option value="AF">Afghanistan</option>
                    <option value="AX">Åland Islands</option>
                    <option value="AL">Albania</option>
                    <option value="DZ">Algeria</option>
                    <option value="AS">American Samoa</option>
                    <option value="AD">Andorra</option>
                    <option value="AO">Angola</option>
                    <option value="AI">Anguilla</option>
                    <option value="AQ">Antarctica</option>
                    <option value="AG">Antigua and Barbuda</option>
                    <option value="AR">Argentina</option>
                    <option value="AM">Armenia</option>
                    <option value="AW">Aruba</option>
                    <option value="AU">Australia</option>
                    <option value="AT">Austria</option>
                    <option value="AZ">Azerbaijan</option>
                    <option value="BS">Bahamas</option>
                    <option value="BH">Bahrain</option>
                    <option value="BD">Bangladesh</option>
                    <option value="BB">Barbados</option>
                    <option value="BY">Belarus</option>
                    <option value="BE">Belgium</option>
                    <option value="BZ">Belize</option>
                    <option value="BJ">Benin</option>
                    <option value="BM">Bermuda</option>
                    <option value="BT">Bhutan</option>
                    <option value="BO">Bolivia</option>
                    <option value="BQ">Bonaire</option>
                    <option value="BA">Bosnia </option>
                    <option value="BW">Botswana</option>
                    <option value="BV">Bouvet Island</option>
                    <option value="BR">Brazil</option>
                    <option value="BN">Brunei Darussalam</option>
                    <option value="BG">Bulgaria</option>
                    <option value="BF">Burkina Faso</option>
                    <option value="BI">Burundi</option>
                    <option value="KH">Cambodia</option>
                    <option value="CM">Cameroon</option>
                    <option value="CA">Canada</option>
                    <option value="CV">Cape Verde</option>
                    <option value="KY">Cayman Islands</option>
                    <option value="CF">Central African Republic</option>
                    <option value="TD">Chad</option>
                    <option value="CL">Chile</option>
                    <option value="CN">China</option>
                    <option value="CX">Christmas Island</option>
                    <option value="CC">Cocos Islands</option>
                    <option value="CO">Colombia</option>
                    <option value="KM">Comoros</option>
                    <option value="CG">Congo</option>
                    <option value="CD">Congo</option>
                    <option value="CK">Cook Islands</option>
                    <option value="CR">Costa Rica</option>
                    <option value="CI">Côte d'Ivoire</option>
                    <option value="HR">Croatia</option>
                    <option value="CU">Cuba</option>
                    <option value="CW">Curaçao</option>
                    <option value="CY">Cyprus</option>
                    <option value="CZ">Czech Republic</option>
                    <option value="DK">Denmark</option>
                    <option value="DJ">Djibouti</option>
                    <option value="DM">Dominica</option>
                    <option value="DO">Dominican Republic</option>
                    <option value="EC">Ecuador</option>
                    <option value="EG">Egypt</option>
                    <option value="SV">El Salvador</option>
                    <option value="GQ">Equatorial Guinea</option>
                    <option value="ER">Eritrea</option>
                    <option value="EE">Estonia</option>
                    <option value="ET">Ethiopia</option>
                    <option value="FK">Falkland Islands </option>
                    <option value="FO">Faroe Islands</option>
                    <option value="FJ">Fiji</option>
                    <option value="FI">Finland</option>
                    <option value="FR">France</option>
                    <option value="GF">French Guiana</option>
                    <option value="PF">French Polynesia</option>
                    <option value="GA">Gabon</option>
                    <option value="GM">Gambia</option>
                    <option value="GE">Georgia</option>
                    <option value="DE">Germany</option>
                    <option value="GH">Ghana</option>
                    <option value="GI">Gibraltar</option>
                    <option value="GR">Greece</option>
                    <option value="GL">Greenland</option>
                    <option value="GD">Grenada</option>
                    <option value="GP">Guadeloupe</option>
                    <option value="GU">Guam</option>
                    <option value="GT">Guatemala</option>
                    <option value="GG">Guernsey</option>
                    <option value="GN">Guinea</option>
                    <option value="GW">Guinea-Bissau</option>
                    <option value="GY">Guyana</option>
                    <option value="HT">Haiti</option>
                    <option value="HN">Honduras</option>
                    <option value="HK">Hong Kong</option>
                    <option value="HU">Hungary</option>
                    <option value="IS">Iceland</option>
                    <option value="IN">India</option>
                    <option value="ID">Indonesia</option>
                    <option value="IR">Iran</option>
                    <option value="IQ">Iraq</option>
                    <option value="IE">Ireland</option>
                    <option value="IM">Isle of Man</option>
                    <option value="IL">Israel</option>
                    <option value="IT">Italy</option>
                    <option value="JM">Jamaica</option>
                    <option value="JP">Japan</option>
                    <option value="JE">Jersey</option>
                    <option value="JO">Jordan</option>
                    <option value="KZ">Kazakhstan</option>
                    <option value="KE">Kenya</option>
                    <option value="KI">Kiribati</option>
                    <option value="KR">Korea</option>
                    <option value="KW">Kuwait</option>
                    <option value="KG">Kyrgyzstan</option>
                    <option value="LV">Latvia</option>
                    <option value="LB">Lebanon</option>
                    <option value="LS">Lesotho</option>
                    <option value="LR">Liberia</option>
                    <option value="LY">Libya</option>
                    <option value="LI">Liechtenstein</option>
                    <option value="LT">Lithuania</option>
                    <option value="LU">Luxembourg</option>
                    <option value="MO">Macao</option>
                    <option value="MK">Macedonia</option>
                    <option value="MG">Madagascar</option>
                    <option value="MW">Malawi</option>
                    <option value="MY">Malaysia</option>
                    <option value="MV">Maldives</option>
                    <option value="ML">Mali</option>
                    <option value="MT">Malta</option>
                    <option value="MH">Marshall Islands</option>
                    <option value="MQ">Martinique</option>
                    <option value="MR">Mauritania</option>
                    <option value="MU">Mauritius</option>
                    <option value="YT">Mayotte</option>
                    <option value="MX">Mexico</option>
                    <option value="MD">Moldova</option>
                    <option value="MC">Monaco</option>
                    <option value="MN">Mongolia</option>
                    <option value="ME">Montenegro</option>
                    <option value="MS">Montserrat</option>
                    <option value="MA">Morocco</option>
                    <option value="MZ">Mozambique</option>
                    <option value="MM">Myanmar</option>
                    <option value="NA">Namibia</option>
                    <option value="NR">Nauru</option>
                    <option value="NP">Nepal</option>
                    <option value="NL">Netherlands</option>
                    <option value="NC">New Caledonia</option>
                    <option value="NZ">New Zealand</option>
                    <option value="NI">Nicaragua</option>
                    <option value="NE">Niger</option>
                    <option value="NG">Nigeria</option>
                    <option value="NU">Niue</option>
                    <option value="NF">Norfolk Island</option>
                    <option value="NO">Norway</option>
                    <option value="OM">Oman</option>
                    <option value="PK">Pakistan</option>
                    <option value="PW">Palau</option>
                    <option value="PS">Palestinian Territory</option>
                    <option value="PA">Panama</option>
                    <option value="PG">Papua New Guinea</option>
                    <option value="PY">Paraguay</option>
                    <option value="PE">Peru</option>
                    <option value="PH">Philippines</option>
                    <option value="PN">Pitcairn</option>
                    <option value="PL">Poland</option>
                    <option value="PT" id="pt">Portugal</option>
                    <option value="PR">Puerto Rico</option>
                    <option value="QA">Qatar</option>
                    <option value="RE">Réunion</option>
                    <option value="RO">Romania</option>
                    <option value="RU">Russian Federation</option>
                    <option value="RW">Rwanda</option>
                    <option value="BL">Saint Barthélemy</option>
                    <option value="LC">Saint Lucia</option>
                    <option value="WS">Samoa</option>
                    <option value="SM">San Marino</option>
                    <option value="ST">Sao Tome and Principe</option>
                    <option value="SA">Saudi Arabia</option>
                    <option value="SN">Senegal</option>
                    <option value="RS">Serbia</option>
                    <option value="SC">Seychelles</option>
                    <option value="SL">Sierra Leone</option>
                    <option value="SG">Singapore</option>
                    <option value="SK">Slovakia</option>
                    <option value="SI">Slovenia</option>
                    <option value="SB">Solomon Islands</option>
                    <option value="SO">Somalia</option>
                    <option value="ZA">South Africa</option>
                    <option value="SS">South Sudan</option>
                    <option value="ES">Spain</option>
                    <option value="LK">Sri Lanka</option>
                    <option value="SD">Sudan</option>
                    <option value="SR">Suriname</option>
                    <option value="SZ">Swaziland</option>
                    <option value="SE">Sweden</option>
                    <option value="CH">Switzerland</option>
                    <option value="SY">Syrian Arab Republic</option>
                    <option value="TW">Taiwan</option>
                    <option value="TJ">Tajikistan</option>
                    <option value="TZ">Tanzania</option>
                    <option value="TH">Thailand</option>
                    <option value="TL">Timor-Leste</option>
                    <option value="TG">Togo</option>
                    <option value="TK">Tokelau</option>
                    <option value="TO">Tonga</option>
                    <option value="TT">Trinidad and Tobago</option>
                    <option value="TN">Tunisia</option>
                    <option value="TR">Turkey</option>
                    <option value="TM">Turkmenistan</option>
                    <option value="TV">Tuvalu</option>
                    <option value="UG">Uganda</option>
                    <option value="UA">Ukraine</option>
                    <option value="AE">United Arab Emirates</option>
                    <option value="GB">United Kingdom</option>
                    <option value="US">United States</option>
                    <option value="UY">Uruguay</option>
                    <option value="UZ">Uzbekistan</option>
                    <option value="VU">Vanuatu</option>
                    <option value="VE">Venezuela</option>
                    <option value="VN">Viet Nam</option>
                    <option value="VG">Virgin Islands</option>
                    <option value="WF">Wallis and Futuna</option>
                    <option value="EH">Western Sahara</option>
                    <option value="YE">Yemen</option>
                    <option value="ZM">Zambia</option>
                    <option value="ZW">Zimbabwe</option>
            </select>

                <select id ="listaD" id="distrito" name="distrito" onchange="lista_concelhos(this);">
                    <option value="defD" selected>Selecionar Distrito</option>
                    <option value="AC" >Açores</option>
                    <option value="AV">Aveiro</option>
                    <option value="BE">Beja</option>
                    <option value="BR">Braga</option>
                    <option value="BRÇ">Bragança</option>
                    <option value="CA">Castelo Branco</option>
                    <option value="CO">Coimbra</option>
                    <option value="EV">Évora</option>
                    <option value="FA">Faro</option>
                    <option value="GU">Guarda</option>
                    <option value="LE">Leiria </option>
                    <option value="LI">Lisboa</option>
                    <option value="MA">Madeira</option>
                    <option value="PO">Portalegre</option>
                    <option value="POR">Porto</option>
                    <option value="SA">Santarém</option>
                    <option value="SE">Setúbal</option>
                    <option value="VIA">Viana do Castelo</option>
                    <option value="VIL">Vila Real</option>
                    <option value="VIS">Viseu</option>
            </select>

                <select name="concelho" id = "acores" >
                    <option value="def" selected>Selecionar Concelho</option>
                    <option value="Angra do Heroismo">Angra do Heroísmo </option>
                    <option value="Calheta">Calheta </option>
                    <option value="Corvo">Corvo </option>
                    <option value="Horta">Horta </option>
                    <option value="Lagoa">Lagoa </option>
                    <option value="Lajes das Flores">Lajes das Flores </option>
                    <option value="lajes Pico">Lajes do Pico </option>
                    <option value="Madalena">Madalena </option>
                    <option value="Nordeste">Nordeste </option>
                    <option value="Ponta Delgada">Ponta Delgada </option>
                    <option value="Povoacao">Povoação </option>
                    <option value="Praia da Vitoria">Praia da Vitória </option>
                    <option value="Ribeira Grande">Ribeira Grande </option>
                    <option value="Santa Cruz da Graciosa">Santa Cruz da Graciosa </option>
                    <option value="Santa Cruz das Flores">Santa Cruz das Flores </option>
                    <option value="Sao Roque do Pico">São Roque do Pico </option>
                    <option value="Velas">Velas </option>
                    <option value="Vila do Porto">Vila do Porto </option>
                    <option value="Vila Franca do Campo">Vila Franca do Campo </option>
                </select>


                <select name="concelho" id = "aveiro" onchange="alert(this.value);">
                    <option value="Águeda">Águeda</option>
                    <option value="Albergaria-a-Velha">Albergaria-a-Velha</option>
                    <option value="Anadia">Anadia</option>
                    <option value="Arouca">Arouca</option>
                    <option value="Aveiro">Aveiro</option>
                    <option value="Castelo de Paiva">Castelo de Paiva</option>
                    <option value="Espinho">Espinho</option>
                    <option value="Estarreja">Estarreja</option>
                    <option value="Ílhavo">Ílhavo</option>
                    <option value="Mealhada">Mealhada</option>
                    <option value="Murtosa">Murtosa</option>
                    <option value="Oliveira de Azeméis">Oliveira de Azeméis</option>
                    <option value="Oliveira do Bairro">Oliveira do Bairro</option>
                    <option value="Ovar">Ovar</option>
                    <option value="Santa Maria da Feira">Santa Maria da Feira</option>
                    <option value="São João da Madeira">São João da Madeira</option>
                    <option value="Sever do Vouga">Sever do Vouga</option>
                    <option value="Vagos">Vagos</option>
                    <option value="Vale de Cambra">Vale de Cambra</option>
                </select>

                <select name="concelho" id = "beja">
                    <option value="def" selected>Selecionar Concelho</option>
                    <option value="Aljustrel">Aljustrel</option>
                    <option value="Almodôvar">Almodôvar</option>
                    <option value="Alvito">Alvito</option>
                    <option value="Barrancos">Barrancos</option>
                    <option value="Beja">Beja</option>
                    <option value="Castro Verde">Castro Verde</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Ferreira do Alentejo">Ferreira do Alentejo</option>
                    <option value="Mértola">Mértola</option>
                    <option value="Moura">Moura</option>
                    <option value="Odemira">Odemira</option>
                    <option value="Ourique">Ourique</option>
                    <option value="Serpa">Serpa</option>
                    <option value="Vidigueira">Vidigueira</option>
                </select>

                <select name="concelho" id = "braga">
                    <option value="def" selected>Selecionar Concelho</option>
                    <option value="Amares">Amares</option>
                    <option value="Barcelos">Barcelos</option>
                    <option value="Braga">Braga</option>
                    <option value="Cabeceiras de Basto">Cabeceiras de Basto</option>
                    <option value="Celorico de Basto">Celorico de Basto</option>
                    <option value="Esposende">Esposende</option>
                    <option value="Fafe">Fafe</option>
                    <option value="Guimarães">Guimarães</option>
                    <option value="Póvoa de Lanhoso">Póvoa de Lanhoso</option>
                    <option value="Terras de Bouro">Terras de Bouro</option>
                    <option value="Vieira do Minho">Vieira do Minho</option>
                    <option value="Vila Nova de Famalicão">Vila Nova de Famalicão</option>
                    <option value="Vila Verde">Vila Verde</option>
                    <option value="Vizela">Vizela</option>
                </select>

                <select name="concelho" id = "braganca" >
                    <option value="def" selected>Selecionar Concelho</option>
                    <option value="Alfândega da Fé">Alfândega da Fé</option>
                    <option value="Bragança">Bragança</option>
                    <option value="Carrazeda de Ansiães">Carrazeda de Ansiães</option>
                    <option value="Freixo de Espada à Cinta">Freixo de Espada à Cinta</option>
                    <option value="Macedo de Cavaleiros">Macedo de Cavaleiros</option>
                    <option value="Miranda do Douro">Miranda do Douro</option>
                    <option value="Mirandela">Mirandela</option>
                    <option value="Mogadouro">Mogadouro</option>
                    <option value="Torre de Moncorvo">Torre de Moncorvo</option>
                    <option value="Vila Flor">Vila Flor</option>
                    <option value="Vimioso">Vimioso</option>
                    <option value="Vinhais">Vinhais</option>
                </select>
                <select name="concelho"id = "castelo" >
                    <option value="def" selected>Selecionar Concelho</option>
                    <option value="Belmonte">Belmonte</option>
                    <option value="Castelo Branco">Castelo Branco</option>
                    <option value="Covilhã">Covilhã</option>
                    <option value="Fundão">Fundão</option>
                    <option value="Idanha-a-Nova">Idanha-a-Nova</option>
                    <option value="Oleiros">Oleiros</option>
                    <option value="Penamacor">Penamacor</option>
                    <option value="Proença-a-Nova">Proença-a-Nova</option>
                    <option value="Sertã">Sertã</option>
                    <option value="Vila de Rei">Vila de Rei</option>
                    <option value="Vila Velha de Ródão">Vila Velha de Ródão</option>
                </select>
                <select name="concelho" id = "coimbra">
                    <option value="def" selected>Selecionar Concelho</option>
                    <option value="Arganil">Arganil</option>
                    <option value="Cantanhede">Cantanhede</option>
                    <option value="Coimbra">Coimbra</option>
                    <option value="Condeixa-a-Nova">Condeixa-a-Nova</option>
                    <option value="Figueira da Foz">Figueira da Foz</option>
                    <option value="Góis">Góis</option>
                    <option value="Lousã">Lousã</option>
                    <option value="Mira">Mira</option>
                    <option value="Miranda do Corvo">Miranda do Corvo</option>
                    <option value="Montemor-o-Velho">Montemor-o-Velho</option>
                    <option value="Oliveira do Hospital">Oliveira do Hospital</option>
                    <option value="Pampilhosa da Serra">Pampilhosa da Serra</option>
                    <option value="Penacova">Penacova</option>
                    <option value="Penela">Penela</option>
                    <option value="Soure">Soure</option>
                    <option value="Tábua">Tábua</option>
                    <option value="Vila Nova de Poiares">Vila Nova de Poiares</option>
                </select>
                <select name="concelho"id = "evora" >
                    <option value="def" selected>Selecionar Concelho</option>
                    <option value="Alandroal">Alandroal</option>
                    <option value="Arraiolos">Arraiolos</option>
                    <option value="Borba">Borba</option>
                    <option value="Estremoz">Estremoz</option>
                    <option value="Évora">Évora</option>
                    <option value="Montemor-o-Novo">Montemor-o-Novo</option>
                    <option value="Mora">Mora</option>
                    <option value="Mourão">Mourão</option>
                    <option value="Olivença">Olivença</option>
                    <option value="Portel">Portel</option>
                    <option value="Redondo">Redondo</option>
                    <option value="Reguengos de Monsaraz">Reguengos de Monsaraz</option>
                    <option value="Vendas Novas">Vendas Novas</option>
                    <option value="Viana do Alentejo">Viana do Alentejo</option>
                    <option value="Vila Viçosa">Vila Viçosa</option>
                </select>
                <select name="concelho"id = "faro" >
                    <option value="def" selected>Selecionar Concelho</option>
                    <option value="Albufeira">Albufeira</option>
                    <option value="Alcoutim">Alcoutim</option>
                    <option value="Aljezur">Aljezur</option>
                    <option value="Castro Marim">Castro Marim</option>
                    <option value="Faro">Faro</option>
                    <option value="Lagoa">Lagoa</option>
                    <option value="Lagos">Lagos</option>
                    <option value="Loulé">Loulé</option>
                    <option value="Monchique">Monchique</option>
                    <option value="Olhão">Olhão</option>
                    <option value="Portimão">Portimão</option>
                    <option value="São Brás de Alportel">São Brás de Alportel</option>
                    <option value="Silves">Silves</option>
                    <option value="Tavira">Tavira</option>
                    <option value="Vila do Bispo">Vila do Bispo</option>
                    <option value="Vila Real de Santo António">Vila Real de Santo António</option>
                </select>
                <select name="concelho" id = "guarda">
                    <option value="def" selected>Selecionar Concelho</option>
                    <option value="Aguiar da Beira">Aguiar da Beira</option>
                    <option value="Almeida">Almeida</option>
                    <option value="Celorico da Beira">Celorico da Beira</option>
                    <option value="Figueira de Castelo Rodrigo">Figueira de Castelo Rodrigo</option>
                    <option value="Fornos de Algodres">Fornos de Algodres</option>
                    <option value="Gouveia">Gouveia</option>
                    <option value="Guarda">Guarda</option>
                    <option value="Manteigas">Manteigas</option>
                    <option value="Mêda">Mêda</option>
                    <option value="Pinhel">Pinhel</option>
                    <option value="Sabugal">Sabugal</option>
                    <option value="Seia">Seia</option>
                    <option value="Trancoso">Trancoso</option>
                    <option value="Vila Nova de Foz Côa">Vila Nova de Foz Côa</option>
                </select>
                <select name="concelho" id = "leiria">
                    <option value="def" selected>Selecionar Concelho</option>
                    <option value="Alcobaça">Alcobaça </option>
                    <option value="Alvaiázere">Alvaiázere </option>
                    <option value="Ansião">Ansião </option>
                    <option value="Batalha">Batalha</option>
                    <option value="Bombarral">Bombarral</option>
                    <option value="Caldas da Rainha">Caldas da Rainha</option>
                    <option value="Castanheira de Pera">Castanheira de Pera</option>
                    <option value="Figueiró dos Vinhos">Figueiró dos Vinhos</option>
                    <option value="Leiria">Leiria</option>
                    <option value="Marinha Grande">Marinha Grande</option>
                    <option value="Nazaré">Nazaré</option>
                    <option value="Óbidos">Óbidos</option>
                    <option value="Pedrógão Grande">Pedrógão Grande</option>
                    <option value="Peniche">Peniche</option>
                    <option value="Pombal">Pombal</option>
                    <option value="Porto de Mós">Porto de Mós</option>
                </select>
                <select name="concelho" id = "lisboa">
                    <option value="def" selected>Selecionar Concelho</option>
                    <option value="Alenquer">Alenquer</option>
                    <option value="Amadora">Amadora</option>
                    <option value="Arruda dos Vinhos">Arruda dos Vinhos</option>
                    <option value="Azambuja">Azambuja</option>
                    <option value="Cadaval">Cadaval</option>
                    <option value="Cascais">Cascais</option>
                    <option value="Lisboa">Lisboa</option>
                    <option value="Loures">Loures</option>
                    <option value="Lourinhã">Lourinhã</option>
                    <option value="Mafra">Mafra</option>
                    <option value="Odivelas">Odivelas</option>
                    <option value="Oeiras">Oeiras</option>
                    <option value="Sintra">Sintra</option>
                    <option value="Sobral de Monte Agraço">Sobral de Monte Agraço</option>
                    <option value="Torres Vedras">Torres Vedras</option>
                    <option value="Vila Franca de Xira">Vila Franca de Xira</option>
                </select>
                <select name="concelho" id = "madeira">
                    <option value="def" selected>Selecionar Concelho</option>
                    <option value="Calheta">Calheta</option>
                    <option value="Câmara de Lobos">Câmara de Lobos</option>
                    <option value="Funchal">Funchal</option>
                    <option value="Machico">Machico</option>
                    <option value="Ponta do Sol">Ponta do Sol</option>
                    <option value="Porto Moniz">Porto Moniz</option>
                    <option value="Porto Santo">Porto Santo</option>
                    <option value="Ribeira Brava">Ribeira Brava</option>
                    <option value="Santa Cruz">Santa Cruz</option>
                    <option value="Santana">Santana</option>
                    <option value="São Vicente">São Vicente</option>
                </select>
                <select name="concelho" id = "portalegre">
                    <option value="def" selected>Selecionar Concelho</option>
                    <option value="Alter do Chão">Alter do Chão</option>
                    <option value="Arronches">Arronches</option>
                    <option value="Avis">Avis</option>
                    <option value="Campo Maior">Campo Maior</option>
                    <option value="Castelo de Vide">Castelo de Vide</option>
                    <option value="Crato">Crato</option>
                    <option value="Elvas">Elvas</option>
                    <option value="Fronteira">Fronteira</option>
                    <option value="Gavião">Gavião</option>
                    <option value="Marvão">Marvão</option>
                    <option value="Monforte">Monforte</option>
                    <option value="Nisa">Nisa</option>
                    <option value="Ponte de Sor">Ponte de Sor</option>
                    <option value="Portalegre">Portalegre</option>
                    <option value="Sousel">Sousel</option>
                </select>
                <select name="concelho" id = "porto">
                    <option value="def" selected>Selecionar Concelho</option>
                    <option value="Amarante">Amarante</option>
                    <option value="Baião">Baião</option>
                    <option value="Felgueiras">Felgueiras</option>
                    <option value="Gondomar">Gondomar</option>
                    <option value="Lousada">Lousada</option>
                    <option value="Maia">Maia</option>
                    <option value="Marco de Canaveses">Marco de Canaveses</option>
                    <option value="Matosinhos">Matosinhos</option>
                    <option value="Paços de Ferreira">Paços de Ferreira</option>
                    <option value="Paredes">Paredes</option>
                    <option value="Penafiel">Penafiel</option>
                    <option value="Porto">Porto</option>
                    <option value="Póvoa de Varzim">Póvoa de Varzim</option>
                    <option value="Santo Tirso">Santo Tirso</option>
                    <option value="Trofa">Trofa</option>
                    <option value="Valongo">Valongo</option>
                    <option value="Vila do Conde">Vila do Conde</option>
                    <option value="Vila Nova de Gaia">Vila Nova de Gaia</option>
                </select>
                <select name="concelho" id = "santarem">
                    <option value="def" selected>Selecionar Concelho</option>
                    <option value="Abrantes">Abrantes</option>
                    <option value="Alcanena">Alcanena</option>
                    <option value="Almeirim">Almeirim</option>
                    <option value="Alpiarça">Alpiarça</option>
                    <option value="Benavente">Benavente</option>
                    <option value="Cartaxo">Cartaxo</option>
                    <option value="Chamusca">Chamusca</option>
                    <option value="Constância">Constância</option>
                    <option value="Coruche">Coruche</option>
                    <option value="Entroncamento">Entroncamento</option>
                    <option value="Ferreira do Zêzere">Ferreira do Zêzere</option>
                    <option value="Golegã">Golegã</option>
                    <option value="Mação">Mação</option>
                    <option value="Ourém">Ourém</option>
                    <option value="Rio Maior">Rio Maior</option>
                    <option value="Salvaterra de Magos">Salvaterra de Magos</option>
                    <option value="Santarém">Santarém</option>
                    <option value="Sardoal">Sardoal</option>
                    <option value="Tomar">Tomar</option>
                    <option value="Torres Novas">Torres Novas</option>
                    <option value="Vila Nova da Barquinha">Vila Nova da Barquinha</option>
                </select>
                <select name="concelho" id = "setubal">
                    <option value="def" selected>Selecionar Concelho</option>
                    <option value="Alcácer do Sal">Alcácer do Sal</option>
                    <option value="Alcochete">Alcochete</option>
                    <option value="Almada">Almada</option>
                    <option value="Barreiro">Barreiro</option>
                    <option value="Grândola">Grândola</option>
                    <option value="Moita">Moita</option>
                    <option value="Montijo">Montijo</option>
                    <option value="Palmela">Palmela</option>
                    <option value="Santiago do Cacém">Santiago do Cacém</option>
                    <option value="Seixal">Seixal</option>
                    <option value="Sesimbra">Sesimbra</option>
                    <option value="Setúbal">Setúbal</option>
                    <option value="Sines">Sines</option>
                </select>
                <select name="concelho" id = "viana">
                    <option value="def" selected>Selecionar Concelho</option>
                    <option value="Arcos de Valdevez">Arcos de Valdevez</option>
                    <option value="Caminha">Caminha</option>
                    <option value="Melgaço">Melgaço</option>
                    <option value="Monção">Monção</option>
                    <option value="Paredes de Coura">Paredes de Coura</option>
                    <option value="Ponte da Barca">Ponte da Barca</option>
                    <option value="Ponte de Lima">Ponte de Lima</option>
                    <option value="Valença">Valença</option>
                    <option value="Viana do Castelo">Viana do Castelo</option>
                    <option value="Vila Nova de Cerveira">Vila Nova de Cerveira</option>
                </select>
                <select name="concelho" id = "vila">
                    <option value="def" selected>Selecionar Concelho</option>
                    <option value="Alijó">Alijó</option>
                    <option value="Boticas">Boticas</option>
                    <option value="Chaves">Chaves</option>
                    <option value="Mesão Frio">Mesão Frio</option>
                    <option value="Mondim de Basto">Mondim de Basto</option>
                    <option value="Montalegre">Montalegre</option>
                    <option value="Murça">Murça</option>
                    <option value="Peso da Régua">Peso da Régua</option>
                    <option value="Ribeira de Pena">Ribeira de Pena</option>
                    <option value="Sabrosa">Sabrosa</option>
                    <option value="Santa Marta de Penaguião">Santa Marta de Penaguião</option>
                    <option value="Valpaços">Valpaços</option>
                    <option value="Vila Pouca de Aguiar">Vila Pouca de Aguiar</option>
                    <option value="Vila Real">Vila Real</option>
                </select>
                <select id="viseu" name="concelho" aria-busy="">
                    <option value="def" selected>Selecionar Concelho</option>
                    <option value="Armamar">Armamar</option>
                    <option value="Carregal do Sal">Carregal do Sal</option>
                    <option value="Castro Daire">Castro Daire</option>
                    <option value="Cinfães">Cinfães</option>
                    <option value="Lamego">Lamego</option>
                    <option value="Mangualde">Mangualde</option>
                    <option value="Moimenta da Beira">Moimenta da Beira</option>
                    <option value="Mortágua">Mortágua</option>
                    <option value="Nelas">Nelas</option>
                    <option value="Oliveira de Frades">Oliveira de Frades</option>
                    <option value="Penalva do Castelo">Penalva do Castelo</option>
                    <option value="Penedono">Penedono</option>
                    <option value="Resende">Resende</option>
                    <option value="Santa Comba Dão">Santa Comba Dão</option>
                    <option value="São João da Pesqueira">São João da Pesqueira</option>
                    <option value="São Pedro do Sul">São Pedro do Sul</option>
                    <option value="Sátão">Sátão</option>
                    <option value="Sernancelhe">Sernancelhe</option>
                    <option value="Tabuaço">Tabuaço</option>
                    <option value="Tarouca">Tarouca</option>
                    <option value="Tondela">Tondela</option>
                    <option value="Vila Nova de Paiva">Vila Nova de Paiva</option>
                    <option value="Viseu">Viseu</option>
                    <option value="Vouzela">Vouzela</option>
                </select>
        </div>

        <div id="user">
            <p class="field"> Username:<?php echo '<span>'.$_SESSION["nickErr"].'</span>';?></p>
            <input type="text" name="nick" id="targ5">
        </div>


        <div id="pass">
            <p class="field"> Password: </p>
            <input type="password" name="pass" id="targ6">
        </div>

        <div id="seg">
            <p class="field">Qual é o nome do seu primeiro animal de estimação?</p>
            <input type="text" name="seg" id="targ7">
        </div>
                    <br /><br />

        <a class="field">Escolher avatar</a>
            
            

        <input type="file" name="userfile" size="20" />

        <br /><br />




        <input type="submit" value="Registar" id="logbtn" class="field" > <i style="font-size:24px" class="fa" id="symbreg1">&#xf0fa;</i> <i style="font-size:24px" class="fa" id="symbreg2">&#xf0fa;</i>
        <div id="disabledregisto"> </div>
        <img src="<?php echo base_url(); ?>assets/img/Biohazard2.png" id="img1">
        <img src="<?php echo base_url(); ?>assets/img/Biohazard2.png" id="img2">
    </form>



</body>

    </html>


<script>


function yesnoCheck(that) {
    if (that.value == "PT") {
        document.getElementById("listaD").style.display = "block";
    } else {
        document.getElementById("listaD").style.display = "none";
    }
}

function lista_concelhos(that) {
    if (that.value == "AC") {
        document.getElementById("acores").style.display = "block";

    } else {
        document.getElementById("acores").style.display = "none";
    }
    if (that.value == "AV") {
        document.getElementById("aveiro").style.display = "block";

    } else {
        document.getElementById("aveiro").style.display = "none";
    }
    if (that.value == "BE") {
        document.getElementById("beja").style.display = "block";

    } else {
        document.getElementById("beja").style.display = "none";
    }
    if (that.value == "BR") {
        document.getElementById("braga").style.display = "block";

    } else {
        document.getElementById("braga").style.display = "none";
    }
    if (that.value == "BRÇ") {
        document.getElementById("braganca").style.display = "block";

    } else {
        document.getElementById("braganca").style.display = "none";
    }
    if (that.value == "CA") {
        document.getElementById("castelo").style.display = "block";

    } else {
        document.getElementById("castelo").style.display = "none";
    }
    if (that.value == "CO") {
        document.getElementById("coimbra").style.display = "block";

    } else {
        document.getElementById("coimbra").style.display = "none";
    }
    if (that.value == "EV") {
        document.getElementById("evora").style.display = "block";

    } else {
        document.getElementById("evora").style.display = "none";
    }
    if (that.value == "FA") {
        document.getElementById("faro").style.display = "block";

    } else {
        document.getElementById("faro").style.display = "none";
    }
    if (that.value == "GU") {
        document.getElementById("acores").style.display = "block";

    } else {
        document.getElementById("acores").style.display = "none";
    }
    if (that.value == "LE") {
        document.getElementById("leiria").style.display = "block";

    } else {
        document.getElementById("leiria").style.display = "none";
    }
    if (that.value == "LI") {
        document.getElementById("lisboa").style.display = "block";

    } else {
        document.getElementById("lisboa").style.display = "none";
    }
    if (that.value == "MA") {
        document.getElementById("madeira").style.display = "block";

    } else {
        document.getElementById("madeira").style.display = "none";
    }
    if (that.value == "PO") {
        document.getElementById("portalegre").style.display = "block";

    } else {
        document.getElementById("portalegre").style.display = "none";
    }
    if (that.value == "POR") {
        document.getElementById("porto").style.display = "block";

    } else {
        document.getElementById("porto").style.display = "none";
    }
    if (that.value == "SA") {
        document.getElementById("santarem").style.display = "block";

    } else {
        document.getElementById("santarem").style.display = "none";
    }
    if (that.value == "SE") {
        document.getElementById("setubal").style.display = "block";

    } else {
        document.getElementById("setubal").style.display = "none";
    }
    if (that.value == "VIA") {
        document.getElementById("viana").style.display = "block";

    } else {
        document.getElementById("viana").style.display = "none";
    }
    if (that.value == "VIL") {
        document.getElementById("vila").style.display = "block";

    } else {
        document.getElementById("vila").style.display = "none";
    }
    if (that.value == "VIS") {
        document.getElementById("viseu").style.display = "block";

    } else {
        document.getElementById("viseu").style.display = "none";
    }
}

/*$(document).ready(function() {
    $('form > input').keyup(function() {
        var empty = false;
        $('form > input').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });

        if (empty) {
            $('#disabledregisto').css("display",'block');
        } else {
            $('#disabledregisto').css("display",'none');
        }
    });
});
    */


$(document).ready(function(){
    $('input[type=text],input[type=password],input[type=select]').keyup(function() {
        if ($('#targ1').val() !='' && $('#targ2').val() !='' && $('#targ3').val() !='' && $('#targ4').val() !='' && $('#sexo').val() != "deff" && $('#pais').val() != "def" && $('#targ5').val() != '' && $('#targ6').val() != ''  && $('#targ7').val() != '' ){
            $("#disabledregisto").css("display","none");
        } else {
            $("#disabledregisto").css("display","block");
            }
    });});
</script>
