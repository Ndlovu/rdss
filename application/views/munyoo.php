<script>
           $(function() {         
            $("#json-one").change(function() {
            
                var $dropdown = $(this);
            
                $.getJSON("http://localhost/rdss/data.json", function(data) {
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
    
</script>









<select name="country" id="json-one"id="country" size="1" style="" class="register_select_country form-control"
        title="Name of Your County" admin="1" frontend="1">
    <option selected value="48">Please Select</option>
    <option value="1">Baringo County</option>
    <option value="2">Bomet County</option>
    <option value="3">Bungoma County</option>
    <option value="4">Busia County</option>
    <option value="5">Elgeyo Marakwet County</option>
    <option value="6">Embu County</option>
    <option value="7">Garissa County</option>
    <option value="8">Homa Bay County</option>
    <option value="9">Isiolo County</option>
    <option value="10">Kajiado County</option>
    <option value="11">Kakamega County</option>
    <option value="12">Kericho County</option>
    <option value="13">Kiambu County</option>
    <option value="14">Kilifi County</option>
    <option value="15">Kirinyaga County</option>
    <option value="16">Kisii County</option>
    <option value="17">Kisumu County</option>
    <option value="18">Kitui County</option>
    <option value="19">Kwale County</option>
    <option value="20">Laikipia County</option>
    <option value="21">Lamu County</option>
    <option value="22">Machakos County</option>
    <option value="23">Makueni County</option>
    <option value="24">Mandera County</option>
    <option value="25">Meru County</option>
    <option value="26">Migori County</option>
    <option value="27">Marsabit County</option>
    <option value="28">Mombasa County</option>
    <option value="29">Muranga County</option>
    <option value="30">Nairobi County</option>
    <option value="31">Nakuru County</option>
    <option value="32">Nandi County</option>
    <option value="33">Narok County</option>
    <option value="34">Nyamira County</option>
    <option value="35">Nyandarua County</option>
    <option value="36">Nyeri County</option>
    <option value="37">Samburu County</option>
    <option value="38">Siaya County</option>
    <option value="39">Taita Taveta County</option>
    <option value="40">Tana River County</option>
    <option value="41">Tharaka Nithi County</option>
    <option value="42">Trans Nzoia County</option>
    <option value="43">Turkana County</option>
    <option value="44">Uasin Gishu County</option>
    <option value="45">Vihiga County</option>
    <option value="46">Wajir County</option>
    <option value="47">West Pokot County</option>
    
</select></span><br/>
                                        <span class="input-errors" id="country_err"></span>
                                    </div>
                                    <div class="form-field-info"></div>
                                </div>

                                <div class="form-label-container">
                                    <div class="label_class label_class" style="">
                                        Type Your Ward:<span class="star_class star_class" style="">*</span>&nbsp;
                                        
                                    </div>
                                </div>


      <div class="form-field-container">
                                    <div class="form-field">
                                              <span class="ui-widget">
<select name="state" id="json-two" size="1" style="" class="register_select_state form-control"
        title="Name of Your Ward" admin="1" frontend="1">
        <option>Please choose from above</option>
</select></span><br/>
                                        <span class="input-errors" id="state_err"></span>
                                    </div>
                                    <div class="form-field-info"></div>
                                </div>
