/*
 *  Document   : op_auth_signin.js
 *  
 *  Description: Custom JS per il controllo della login
 */

class OpAuthSignIn {
  /*
   * Init Sign In Form Validation
   *
   */
  static initValidationSignIn() {
    jQuery('.js-validation-signin').validate({
      errorClass: 'invalid-feedback animated fadeInDown',
      errorElement: 'div',
      errorPlacement: (error, e) => {
        jQuery(e).parents('.form-group > div').append(error);
      },
      highlight: e => {
        jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
      },
      success: e => {
        jQuery(e).closest('.form-group').removeClass('is-invalid');
        jQuery(e).remove();
      },
      rules: {
        'login-username': {
          required: true,
          minlength: 1
        },
        'login-password': {
          required: true,
          minlength: 5
        }
      },
      messages: {
        'login-username': {
          required: 'Perfavore inserisci il codice cliente',
          minlength: 'Il codice cliente deve essere lungo più di 1 righe'
        },
        'login-password': {
          required: 'Perfavore inserisci una password',
          minlength: 'Perfavore inserisci una password'
        }
      }
    });
  }

  /*
   * Init functionality
   *
   */
  static init() {
    this.initValidationSignIn();
  }
}

// Initialize when page loads
jQuery(() => {
  OpAuthSignIn.init();
});
