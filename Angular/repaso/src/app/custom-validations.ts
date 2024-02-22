import {AbstractControl, ValidationErrors} from '@angular/forms';

export class CustomValidations {
  static email(control: AbstractControl): ValidationErrors | null {
    let mail = control.value;
    const regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

    if (mail.match(regex))
      return {email: true}
    else
      return null;
  }

  static password(control: AbstractControl): ValidationErrors | null {
    let psswd = control.value;
    const regex = /^(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}|<>?])[a-zA-Z0-9!@#$%^&*()_+{}|<>?]{8,}$/;

    if (psswd.match(regex))
      return {psswd: true};
    else
      return null;
  }
}
