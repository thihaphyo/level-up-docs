export const InputValidation = class {
  emailRegx =
    /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

  //at least 8 characters long, one upper, one lower, one digit, one special
  pwdRegx = /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})/;

  validateName(data) {
    return data.length < 4 ? false : true;
  }
  validateEmail(data) {
    return this.emailRegx.test(data) ? true : false;
  }
  validatePassword(data) {
    console.log("ss");

    return this.pwdRegx.test(data) ? true : false;
  }
  validatePhoneNum(data) {
    return data.length <= 9 ? false : true;
  }
};
