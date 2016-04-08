           $(function() {         
            $("#json-one").change(function() {
            
                var $dropdown = $(this);
            
                $.getJSON("http://localhost/rdss/jsondata/data.json", function(data) {
                    var key = $dropdown.val();
                    var vals = [];
                                        
                    switch(key) {
                        case '1':
                            vals = data.baringocounty.split(",");
                            break;
                        case '2':
                            vals = data.bometcounty.split(",");
                            break;
                        case '3':
                            vals = data.bungomacounty.split(",");
                            break;
                            case '4':
                            vals = data.busiacounty.split(",");
                            break;
                            case '5':
                            vals = data.elgeyomarakwetcounty.split(",");
                            break;
                            case '6':
                            vals = data.embucounty.split(",");
                            break;
                            case '7':
                            vals = data.garissacounty.split(",");
                            break;
                            case '8':
                            vals = data.homabaycounty.split(",");
                            break;
                            case '9':
                            vals = data.isiolocounty.split(",");
                            break;
                            case '10':
                            vals = data.kajiadocounty.split(",");
                            break;
                            case '11':
                            vals = data.kakamegacounty.split(",");
                            break;
                            case '12':
                            vals = data.kerichocounty.split(",");
                            break;
                            case '13':
                            vals = data.kiambucounty.split(",");
                            break;
                            case '14':
                            vals = data.kilificounty.split(",");
                            break;
                            case '15':
                            vals = data.kirinyagacounty.split(",");
                            break;
                            case '16':
                            vals = data.kisiicounty.split(",");
                            break;
                            case '17':
                            vals = data.kisumucounty.split(",");
                            break;
                            case '18':
                            vals = data.kituicounty.split(",");
                            break;
                            case '19':
                            vals = data.kwalecounty.split(",");
                            break;
                            case '20':
                            vals = data.laikipiacounty.split(",");
                            break;
                            case '21':
                            vals = data.lamucounty.split(",");
                            break;
                            case '22':
                            vals = data.machakoscounty.split(",");
                            break;
                            case '23':
                            vals = data.makuenicounty.split(",");
                            break;
                            case '24':
                            vals = data.manderacounty.split(",");
                            break;
                            case '25':
                            vals = data.marsabitcounty.split(",");
                            break;
                            case '26':
                            vals = data.merucounty.split(",");
                            break;
                            case '27':
                            vals = data.migoricounty.split(",");
                            break;
                            case '28':
                            vals = data.mombasacounty.split(",");
                            break;
                            case '29':
                            vals = data.murangacounty.split(",");
                            break;
                            case '30':
                            vals = data.nairobicounty.split(",");
                            break;
                            case '31':
                            vals = data.nakurucounty.split(",");
                            break;
                            case '32':
                            vals = data.nandicounty.split(",");
                            break;
                            case '33':
                            vals = data.narokcounty.split(",");
                            break;
                            case '34':
                            vals = data.nyamiracounty.split(",");
                            break;
                            case '35':
                            vals = data.nyandaruacounty.split(",");
                            break;
                            case '36':
                            vals = data.nyericounty.split(",");
                            break;
                            case '37':
                            vals = data.samburucounty.split(",");
                            break;
                            case '38':
                            vals = data.siayacounty.split(",");
                            break;
                            case '39':
                            vals = data.taitatavetacounty.split(",");
                            break;
                            case '40':
                            vals = data.tanarivercounty.split(",");
                            break;
                            case '41':
                            vals = data.tharakanithicounty.split(",");
                            break;
                            case '42':
                            vals = data.transnzoiacounty.split(",");
                            break;
                            case '43':
                            vals = data.turkanacounty.split(",");
                            break;
                            case '44':
                            vals = data.uasingishucounty.split(",");
                            break;
                            case '45':
                            vals = data.vihigacounty.split(",");
                            break;
                            case '46':
                            vals = data.wajircounty.split(",");
                            break;
                            case '47':
                            vals = data.westpokotcounty.split(",");
                            break;
                            
                        case '48':
                            vals = ['Please choose from above'];
                    }
                    
                    var $jsontwo = $("#json-two");
                    $jsontwo.empty();
                    $.each(vals, function(index, value) {
                        $jsontwo.append("<option>" + value + "</option>");
                    });
            
                });
            });

        });
    