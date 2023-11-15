$(document).ready(function () {

    $('#edit_address').formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            city_id: {
                validators: {
                    notEmpty: {
                        message: 'ÙŠØ¬Ø¨ Ø¥Ø¯Ø®Ø§Ù„ Ø§Ù„Ù…Ù†Ø·Ù‚Ø© '
                    }
                }
            },
            address_name: {
                validators: {
                    notEmpty: {
                        message: 'ÙŠØ¬Ø¨ Ø¥Ø¯Ø®Ø§Ù„ Ø§Ø³Ù… Ø§Ù„Ø¹Ù†ÙˆØ§Ù† '
                    }
                }
            },
            block: {
                validators: {
                    notEmpty: {
                        message: 'ÙŠØ¬Ø¨ ØªØ­Ø¯ÙŠØ¯ Ø§Ù„Ù‚Ø·Ø¹Ø©'
                    },
                    integer: {
                        message: 'ÙŠØ¬Ø¨ Ø£Ù† ØªÙƒÙˆÙ† Ø§Ù„ÙƒØªÙ„Ø© Ø±Ù‚Ù…ÙŠØ©'
                    }
                }
            },
            office_name: {
                validators: {
                    notEmpty: {
                        message: 'ÙŠØ¬Ø¨ ØªÙ‚Ø¯ÙŠÙ… Ø§Ù„Ø±Ù‚Ù… '
                    }
                }
            },
            street: {
                validators: {
                    notEmpty: {
                        message: 'ÙŠØ¬Ø¨ ØªÙ‚Ø¯ÙŠÙ… Ø§Ø³Ù… Ø§Ù„Ø´Ø§Ø±Ø¹ '
                    }
                }
            },
            floor: {
                validators: {
                    notEmpty: {
                        message: 'ÙŠØ¬Ø¨ ØªØ­Ø¯ÙŠØ¯ Ø§Ù„Ø·Ø§Ø¨Ù‚'
                    },
                    integer: {
                        message: 'ÙŠØ¬Ø¨ Ø£Ù† ØªÙƒÙˆÙ† Ø§Ù„ÙƒÙ„Ù…Ø© Ø±Ù‚Ù…ÙŠØ©'
                    }
                }
            },
            appartment: {
                validators: {
                    notEmpty: {
                        message: 'Ù…Ø·Ù„ÙˆØ¨ Ø´Ù‚Ø©'
                    }
                }
            }
        }
    });
    
    $('#add_address').formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            city_id: {
                validators: {
                    notEmpty: {
                        message: 'Ø§Ù„Ù…Ù†Ø·Ù‚Ø© Ù…Ø·Ù„ÙˆØ¨Ø©'
                    }
                }
            },
            address_name: {
                validators: {
                    notEmpty: {
                        message: 'ÙŠØ¬Ø¨ ØªÙ‚Ø¯ÙŠÙ… Ø§Ù„Ø¹Ù†ÙˆØ§Ù†'
                    }
                }
            },
            block: {
                validators: {
                    notEmpty: {
                        message: 'ØªØ­Ø¯ÙŠØ¯ Ø§Ù„Ù‚Ø·Ø¹Ø©'
                    },
                    integer: {
                        message: 'ÙŠØ¬Ø¨ Ø£Ù† ØªÙƒÙˆÙ† Ø§Ù„ÙƒØªÙ„Ø© Ø±Ù‚Ù…ÙŠØ©'
                    }
                }
            },
            street: {
                validators: {
                    notEmpty: {
                        message: 'ÙŠØ¬Ø¨ ØªÙ‚Ø¯ÙŠÙ… Ø§Ø³Ù… Ø§Ù„Ø´Ø§Ø±Ø¹ '
                    }
                }
            },
            office_name: {
                validators: {
                    notEmpty: {
                        message: 'ÙŠØ¬Ø¨ ØªÙ‚Ø¯ÙŠÙ… Ø§Ù„Ø±Ù‚Ù… '
                    }
                }
            },
            floor: {
                validators: {
                    notEmpty: {
                        message: 'ÙŠØ¬Ø¨ ØªØ­Ø¯ÙŠØ¯ Ø§Ù„Ø·Ø§Ø¨Ù‚'
                    },
                    integer: {
                        message: 'ÙŠØ¬Ø¨ Ø£Ù† ØªÙƒÙˆÙ† Ø§Ù„ÙƒÙ„Ù…Ø© Ø±Ù‚Ù…ÙŠØ©'
                    }
                }
            },
            appartment: {
                validators: {
                    notEmpty: {
                        message: 'Ù…Ø·Ù„ÙˆØ¨ Ø´Ù‚Ø©'
                    }
                }
            }
        }
    });
    
});