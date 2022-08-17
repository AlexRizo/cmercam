
<?php

function selectLittleFlag($flag){
    switch ($flag) {
        case 'Dólar USD':
            echo '<img
            class="flag-margen"
            src="/divisas/assets/img/banderas/usd.png"
            height="35"
            width="55"
            alt="Estados Unidos">';
            break;

        case 'Euro':
            echo '<img
            class="flag-margen"
            src="/divisas/assets/img/banderas/europa.png"
            height="35"
            width="55"
            alt="Unión Europea">';
            break;
            
        case 'Yen Japones':
            echo '<img
            class="flag-margen"
            src="https://flagcdn.com/h40/jp.png"
            srcset="https://flagcdn.com/h80/jp.png 2x,
            https://flagcdn.com/h120/jp.png 3x"
            height="35"
            width="55"
            alt="Japón">';
            break;

        case 'Libra Esterlina':
            echo '<img
            class="flag-margen"
            src="/divisas/assets/img/banderas/reino_unido.png"
            height="35"
            width="55"
            alt="Reino Unido">';
            break;

        case 'Dólar Canadiense':
            echo '<img
            class="flag-margen"
            src="/divisas/assets/img/banderas/canadah40.png"
            height="35"
            width="55"
            alt="Canadá">';
            break;
        
        case 'Peso Colombiano':
            echo '<img
            class="flag-margen"
            src="/divisas/assets/img/banderas/colombia.png"
            height="35"
            width="55"
            alt="Colombia">';
            break;

       case 'Dólar Australiano':
            echo '<img
            class="flag-margen"
            src="/divisas/assets/img/banderas/australia.png"
            height="35"
            width="55"
            alt="Australia">';
            break;

        case 'Franco Suizo':
            echo '<img
            class="flag-margen"
            src="/divisas/assets/img/banderas/suizah40.png"
            height="35"
            width="55"
            alt="Suiza">';
            break;

        case 'Yuan Chino':
            echo '<img
            class="flag-margen"
            src="/divisas/assets/img/banderas/china.png"
            height="35"
            width="55"
            alt="China">';
            break;

        case 'Dólar Neozelandes':
            echo '<img
            class="flag-margen"
            src="/divisas/assets/img/banderas/nueva_zelanda.png"
            height="35"
            width="55"
            alt="Nueva Zelanda">';
            break;

            
        case 'Plata':
            echo '<img
            class="plata"
            src="/divisas/assets/img/plata.png"
            height="35"
            width="55"
            alt="Plata">';
            break;
    
        case 'Oro':
            echo '<img
            class="oro"
            src="/divisas/assets/img/oro.png"
            height="35"
            width="55"
            alt="Oro">';
            break;
        
        default:
            echo '<img
            class="flag-margen"
            src="/divisas/assets/img/banderas/onu.png"
            height="35"
            width="55"
            alt="Sin País">';
            break;
    }
}


function selectBigFlag($flag){
    switch ($flag) {
        case 'Dólar USD':
            echo '<img
            class="big-flag"
            src="/divisas/assets/img/banderas/usd.png"
            height="110"
            width="210"
            alt="Estados Unidos">';
            break;

        case 'Euro':
            echo '<img
            class="big-flag"
            src="/divisas/assets/img/banderas/europa.png"
            height="110"
            width="210"
            alt="Unión Europea">';
            break;
            
        case 'Yen Japones':
            echo '<img
            class="big-flag"
            src="https://flagcdn.com/h120/jp.png"
            srcset="https://flagcdn.com/h240/jp.png 2x"
            height="110"
            alt="Japón">';
            break;

        case 'Libra Esterlina':
            echo '<img
            class="big-flag"
            src="/divisas/assets/img/banderas/reino_unido.png"
            height="110"
            width="210"
            alt="Reino Unido">';
            break;

        case 'Dólar Canadiense':
            echo '<img
            class="big-flag"
            src="/divisas/assets/img/banderas/canada.png"
            height="110"
            width="210"
            alt="Canadá">';
            break;
        
        case 'Peso Colombiano':
            echo '<img
            class="big-flag"
            src="/divisas/assets/img/banderas/colombia.png"
            height="110"
            width="210"
            alt="Colombia">';
            break;
        
        case 'Dólar Australiano':
            echo '<img
            class="big-flag"
            src="/divisas/assets/img/banderas/australia.png"
            height="120"
            width="210"
            alt="Australia">';
            break;
        
        case 'Franco Suizo':
            echo '<img
            class="big-flag"
            src="/divisas/assets/img/banderas/suiza.png"
            height="110"
            width="210"
            alt="Suiza">';
            break;

        case 'Yuan Chino':
            echo '<img
            class="big-flag"
            src="/divisas/assets/img/banderas/china.png"
            height="120"
            width="210"
            alt="China">';
            break;

        case 'Dólar Neozelandes':
            echo '<img
            class="big-flag"
            src="/divisas/assets/img/banderas/nueva_zelanda.png"
            height="120"
            width="210"
            alt="Nueva Zelanda">';
            break;

        case 'Plata':
            echo '<img 
            src="../assets/img/plata.png"
            height="40"
            width="60"
            alt="Plata">';
            break;

        case 'Oro':
            echo '<img 
            src="../assets/img/oro.png"
            height="40"
            width="60"
            alt="Oro">';
            break;
        
        default:
            echo '<img
            class="big-flag"
            src="/divisas/assets/img/banderas/onu.png"
            height="110"
            width="210"
            alt="Sin País">';
            break;
    }
}

?>