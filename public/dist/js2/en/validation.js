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
                        message: 'City is required'
                    }
                }
            },
            address_name: {
                validators: {
                    notEmpty: {
                        message: 'Address Name is required'
                    },
                    regexp: {
                        regexp: '^[a-zA-Z0-9 ]+$',
                        message: 'Must be Alpha Numeric'
                    }
                }
            },
            block: {
                validators: {
                    notEmpty: {
                        message: 'Block is required'
                    },
                    integer: {
                        message: 'Block Must be Numeric'
                    }
                }
            },
            judda: {
                validators: {
                    regexp: {
                        regexp: '^[a-zA-Z0-9 ]+$',
                        message: 'Must be Alpha Numeric'
                    }
                }
            },
            office_name: {
                validators: {
                    notEmpty: {
                        message: 'Number is required'
                    },
                    regexp: {
                        regexp: '^[a-zA-Z0-9 ]+$',
                        message: 'Must be Alpha Numeric'
                    }
                }
            },
            street: {
                validators: {
                    notEmpty: {
                        message: 'Street Name is required'
                    },
                    regexp: {
                        regexp: '^[a-zA-Z0-9 ]+$',
                        message: 'Must be Alpha Numeric'
                    }
                }
            },
            floor: {
                validators: {
                    notEmpty: {
                        message: 'Floor is required'
                    },
                    integer: {
                        message: 'Floor Must be Numeric'
                    }
                }
            },
            
            houseno_name: {
                validators: {
                    notEmpty: {
                        message: 'house number is required'
                    }
                }
            },
            appartment: {
                validators: {
                    notEmpty: {
                        message: 'Apartment is required'
                    },
                    regexp: {
                        regexp: '^[a-zA-Z0-9 ]+$',
                        message: 'Must be Alpha Numeric'
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
                        message: 'Area is required'
                    }
                }
            },
            address_name: {
                validators: {
                    notEmpty: {
                        message: 'Address title is required'
                    },
                    regexp: {
                        regexp: '^[a-zA-Z0-9 ]+$',
                        message: 'Must be Alpha Numeric'
                    }
                }
            },
            block: {
                validators: {
                    notEmpty: {
                        message: 'Block is required'
                    },
                    integer: {
                        message: 'Block Must be Numeric'
                    }
                }
            },

            street: {
                validators: {
                    notEmpty: {
                        message: 'Street Name is required'
                    },
                    regexp: {
                        regexp: '^[a-zA-Z0-9 ]+$',
                        message: 'Must be Alpha Numeric'
                    }
                }
            },
            office_name: {
                validators: {
                    notEmpty: {
                        message: 'Number is required'
                    },
                    regexp: {
                        regexp: '^[a-zA-Z0-9 ]+$',
                        message: 'Must be Alpha Numeric'
                    }
                }
            },
            floor: {
                validators: {
                    notEmpty: {
                        message: 'Floor is required'
                    },
                    integer: {
                        message: 'Floor Must be Numeric'
                    }
                }
            },
            appartment: {
                validators: {
                    notEmpty: {
                        message: 'Apartment is required'
                    },
                    regexp: {
                        regexp: '^[a-zA-Z0-9 ]+$',
                        message: 'Must be Alpha Numeric'
                    }
                }
            }
        }
    });
    
});