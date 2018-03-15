class Register{
	checkEmail(email){
		return true;
	}
	
    checkStrenght(password){
		if(password.length >= 6){
			return true;
		} else{
			return false;
		}
    }
	
	checkEquality(password1, password2){
		if(password1 === password2){
			return true;
		} else{
			return false;
		}
	}
}