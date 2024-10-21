<?php

class Fields {
    private $boilerFields = [
            'pibi' => 'PIBI', 
            'pics' => 'PICS', 
            'pica' => 'PICA',
            'eooc' => 'EOOC', 
            'land_registry' => 'Land Registry',
            'ubil' => 'UBIL', 
            'dwp' => 'DWP MATCH CONFIRMATION',
            'eng_sig' => 'ENGINEER SIGNATURE',
            'cus_sig' => 'CUSTOMER SIGNATURE SPECIMENT',
            'boiler_manufacture' => 'BOILER MANUFACTURE GUARANTEE',
            'ppes' => 'PPES', 
            'bacl_b' => 'BACL B', 
            'pasc' => 'PASC', 
            'floor_plan' => 'FLOOR PLAN', 
            'tag' => 'NO TAG PRE BOILER', 
            'pcdb_a' => 'PCDB A', 
            'crr' => 'BACL_C AND BACL_D (COST OF REPAIR AND REPLACEMENT)', 
            'bcom' => 'BCOM', 
            'gase' => 'GASE FORM(HTSC)', 
            'cd10' => 'CD10', 
            'cd11' => 'CD11', 
            'tenancy' => 'TENANCY AGREEMENT', 
            'landlord' => 'LANDLORD PERMISSION', 
            'ti' => 'TI/133', 
            'pre_epc' => 'PRE EPC', 
            'post_epc' => 'POST EPC', 
            'efg' => 'EFG DECLARATION', 
            'notice_of_intent' => 'NOTICE OF INTENT', 
            'la_flex' => 'LA FLEX DECLARATION'
    ];

    private $cavityFields = [
            'efgm' => 'EFGM', 
            'pree' => 'PREE', 
            'pste' => 'PSTE',
            'stns' => 'STNS', 
            'phhs' => 'PHHS',
            'cwsa' => 'CWSA', 
            'dssy_a' => 'DSSY_A',
            'dssy_c' => 'DSSY_C',
            'pibi' => 'PIBI',
            'picp' => 'picp', 
            'pica' => 'PICA', 
            'eooc' => 'EOOC', 
            'land_registry' => 'LAND REGISTRY', 
            'ubil' => 'UBIL', 
            'ciga' => 'CIGA WARRANTY', 
            'eng_sig' => 'ENGINEER SIGNATURE', 
            'pasc' => 'PASC', 
            'breg' => 'BREG', 
            'picm' => 'PICM', 
            'tenancy' => 'TENANCY AGREEMENT', 
            'landlord' => 'LANDLORD PERMISSION',  
            'pre_epc' => 'PRE EPC', 
            'post_epc' => 'POST EPC', 
            'efg' => 'EFG DECLARATION',
    ];
    private $eshFields = [
            'dom' => 'DOM',
            'pibi' => 'PIBI', 
            'dssy_a' => 'DSSY_A', 
            'dssy_c' => 'DSSY_C',
            'pics' => 'PICS', 
            'pica' => 'PICA',
            'eooc' => 'EOOC',
            'land_registry' => 'Land Registry',
            'ubil' => 'UBIL', 
            'dwp' => 'DWP MATCH CONFIRMATION',
            'eng_sig' => 'ENGINEER SIGNATURE',
            'ppes' => 'PPES', 
            'esh_manufacture' => 'ESH MANUFACTURE GUARANTEE', 
            'esh_technical' => 'ESH TECHNICAL SURVEY', 
            'pasc' => 'PASC', 
            'breg' => 'BREG', 
            'floor_plan' => 'FLOOR PLAN',  
            'tenancy' => 'TENANCY AGREEMENT', 
            'landlord' => 'LANDLORD PERMISSION', 
            'pre_epc' => 'PRE EPC', 
            'post_epc' => 'POST EPC', 
            'notice_of_intent' => 'NOTICE OF INTENT', 
            'la_flex' => 'LA FLEX DECLARATION'
    ];
    private $ririFields = [
            'dssy_a' => 'DSSY_A',
            'docc_a' => 'DOCC_A', 
            'misc_a' => 'MISC_A', 
            'pica_a' => 'PICA_A',
            'picp_a' => 'PICP_A',
            'picm_b' => 'PICM_B', 
            'riri_a' => 'RIRI_A',
            'priv_a' => 'PRIV_A',
            'pmhs_a' => 'PMHS_A',
            'epop_a' => 'EPOP_A', 
            'ubil_a' => 'UBIL_A',
            'pibi_b' => 'PIBI_B',
            'pibi_a' => 'PIBI_A', 
            'breg_a' => 'BREG_A', 
            'pasc_a' => 'PASC_A', 
            'ccsc_a' => 'CCSC_A', 
            'floor_plan' => 'FLOOR PLAN', 
            'hhev_a' => 'HHEV_A',  
            'tenancy' => 'TENANCY AGREEMENT', 
            'landlord' => 'LANDLORD PERMISSION', 
            'dwp' => 'DWP MATCH', 
            'cus_sig' => 'CUSTOMER SIGNATURE', 
            'eng_sig' => 'ENGINEER SIGNATURE', 
            'picp' => 'PICP',
            'misc_cus' => 'MISC_CUS',  
            'misc_risk' => 'MISC_RISK', 
            'misc_accident' => 'MISC_ACCIDENT', 
            'misc_term' => 'MISC_TERMS', 
            'misc_waiver' => 'MISC_WAIVER', 
            'asbr_a' => 'ASBR_A', 
            'pre_epc' => 'PRE_EPC',
            'post_epc' => 'POST_EPC'
    ];
    private $loftFields = [
            'pibi_a' => 'PIBI_A', 
            'dssy_a' => 'DSSY_A', 
            'misc_a' => 'MISC_A',
            'picp' => 'PICP', 
            'pica' => 'PICA',
            'pmhs' => 'PMHS (PreMain Heating Source)', 
            'pibi_b' => 'PIBI_B',
            'land_registry' => 'LAND REGISTRY',
            'ubil' => 'UBIL',
            'dwp' => 'DWP MATCH CONFIRMATION',
            'eng_sig' => 'ENGINEER SIGNATURE', 
            'cus_sig' => 'CUSTOMER SIGNATURE SPECIMEN', 
            'epop' => 'EPOP (EXTERNAL PHOTO OF PROPERTY)', 
            'floor_plan' => 'FLOOR PLAN', 
            'breg' => 'BREG', 
            'pasc' => 'PASC', 
            'ldec' => 'LDEC (LOFT INSULATION DECLARATION FORM)', 
            'tenancy_agreement' => 'TENANCY AGREEMENT', 
            'landlord_permission' => 'LANDLORD PERMISSION', 
    ];
    private $solidFields = [
            'pibi' => 'PIBI', 
            'pasc' => 'PASC',
            'dssy_a' => 'DSSY_A',
            'picp' => 'PICP',
            'picm' => 'PICM',
            'pmhs' => 'PMHS (PreMain Heating Source)',
            'eooc' => 'EOOC',
            'land_registry' => 'Land Registry',
            'ubil' => 'UBIL', 
            'dwp' => 'DWP MATCH CONFIRMATION',
            'eng_sig' => 'ENGINEER SIGNATURE',
            'cus_sig' => ' CUSTOMER SIGNATURE SPECIMEN', 
            'id_vents' => 'IDENTIFICATION OF VENTS AND FLUES', 
            'floor_plan' => 'FLOOR PLAN', 
            'breg' => 'BREG', 
            'cusg' => 'CUSG',  
            'weather' => 'WEATHER - EWI DAILY CHECKS', 
            'method_statement' => 'METHOD STATEMENT', 
            'risk_assessment' => 'RISK ASSESSMENT', 
            'tenancy' => 'TENANCY AGREEMENT', 
            'landlord' => 'LANDLORD PERMISSION', 
            'pre_epc' => 'PRE EPC',
            'post_epc' => 'POST EPC',
            'efg' => 'EFG DECLARATION'
    ];
    private $dssybFields = [
            'Bedrooms' => ['bedroom1','bedroom2','bedroom3','bedroom4','bedroom5'],
            'Kitchens' => ['kitchen1', 'kitchen2'],
            'Dining Room' => ['dining_room1', 'dining_room2'],
            'Living Room' => ['living_room1', 'living_room2'],
            'Hallway Room' => ['hallway1','hallway2','hallway3','hallway4','hallway5'],
            'Landing' => ['landing1','landing2','landing3','landing4','landing5'],
            'Fort Elevation' => ['fort_elevation'],
            'Side Elevation' => ['side_elevation1', 'side_elevation2'],
            'Rear Elevation' => ['rear_elevation'],
            'Water Closet' => ['water_closet1','water_closet2','water_closet3','water_closet4','water_closet5'],
            'Utility' => ['utility'],
            'Lounge' => ['lounge1','lounge2','lounge3'],
            'Bathrooms' => ['bathroom1','bathroom2','bathroom3','bathroom4','bathroom5'],
            'Cupboards' => ['cupboard1','cupboard2','cupboard3','cupboard4','cupboard5'],
            'Conservatory' => ['conservatory'],
            'Stairs' => ['stairs1','stairs2','stairs3'],
            'Garages' => ['garage1', 'garage2'],
            'Wall Thickness' => ['wall_thickness1','wall_thickness2','wall_thickness3','wall_thickness4','wall_thickness5'],
            'Fused Spur' => ['fused_spur1','fused_spur2','fused_spur3'],
            'Room Stats' => ['room_stat1','room_stat2','room_stat3'],
            'Programmer' => ['programmer1', 'programmer2', 'programmer3']
    ];

    public function getFields($category)
    {
        $fields = null;
        switch($category){
            case 'boiler':
                $fields = $this->boilerFields;
            break;
            case 'cavity':
                $fields = $this->cavityFields;
            break;
            case 'esh':
                $fields = $this->eshFields;
            break;
            case 'riri':
                $fields = $this->ririFields;
            break;
            case 'loft':
                $fields = $this->loftFields;
            break;
            case 'solid':
                $fields = $this->solidFields;
            break;
            case 'dssy_b':
                $fields = $this->dssybFields;
            break;
        }
        return $fields;
    }
}