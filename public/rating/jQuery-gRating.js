/**
 * Good Rating Jquery plugin
 * Add a html element <div id="rating1" class="rating" value="3"></div>
 * Call the stars plugin to add the functionality
 * $(".rating").grating();
 *
 * Optionally add a callback function
 * $(".rating").grating({
 *   callback: function(owner, value)
 *   {
 *     console.log("Callback from "+owner.attr("id")+" with value "+value);
 *   }
 * });
 * You can assign the rating to a variable to use methods from the plugin
 * var rating = $("#rating").grating();
 * rating.enable(true); rating.val();
 * You can get the value when unassigned by calling the plugin again
 * $(".rating").GRating().val();
 *
 * Properties available on html object (IMPORTANT: These override the default values, even if you pass in new defaults)
 * data-max="int value" - sets number of stars
 * disabled - sets disabled to true
 * value="int value" - sets initial rating value
 * data-character="a character" - sets the character to use as the rating display
 * data-clicklimit="a number" - sets a limit to the number of clicks to be processed on the rating 0 indicates unlimited
 * data-error="a string" - Error text to show if validation is enabled
 * data-deselectable="true|false" - Enables or disables deselecting via clicking on the same rating value
 * required - sets the required flag on the hidden input field
 *
 * Methods available on Jquery plugin
 * enable(boolean) - sets the state of all passed in stars to disabled or enabled (Chainable)
 * val() - returns an object with id or index of the passed in collection against the value
 *         If only one object is present in the collection it returns just the value (Not Chainable)
 *
 * Supports Font-Awesome icon format as characters i.e. fa-ambulance will render <i class="fa fa-ambulance" aria-hidden="true"></i> in a span
 * This would require Font-Awesome css to be imported to your Html page to work
 *
 * Supports Bootstrap Validator for form validation i.e. required will require a value be entered in the rating field
 *
 * Initial design of ratings from https://gielberkers.com/how-to-create-a-neat-star-rating-with-css-and-javascript/
 * Heavily extended entirely modified and turned into a jQuery plugin
 */
(function($) {
  /* Add the plugin to Jquery global fn object */
  $.fn.grating = function(options) {
    /* Default plugin options */
    $.fn.grating.defaultOptions = {
      enabled: true,//Initial enabled or disabled state of the rating
      allowDeselect: true,//Indicates whether to allow select the same rating value twice to toggle off the rating
      character: "&#9733;",//Default character to use i.e. ASCII Star, can be font-awesome fa codes i.e. fa-ambulance
      elementType: "span",//Allows switching the span type to another html element if needed
      elementCount: 5,//How many rating objects to display
      clicklimit: 0,//Whether to limit the number of clicks or not, a value of 0 enables no limit
      defaultValue: 0,//Initial rating value
      required: true,//Whether validation is needed
      validationClass: "form-control",//Validation pattern for the Bootstrap Validator is added to the class of input if required is true
      validationText: "Rating is required",//Overrude the default error message from the Bootstrap Validator
      callback: null,//Placeholder for callback function called onclick events for when a rating is changed
      ratingCss: {//Normal display settings for stars
        fontSize: "30px",
        color: "#fff",//For dark pages
        opacity: ".5",
        cursor: "pointer",
        padding: "0 10px",
        transition: "all 150ms",
        display: "inline-block",
        transform: "rotateX(45deg)",
        transformOrigin: "center bottom",
        textShadow: "none"
      },
      ratingHoverCss: {//Hover settings for stars
        color: "#ff0",
        opacity: "1",
        transform: "rotateX(0deg)",
        textShadow: "0 0 30px #ffc"
      }
    };
    // To avoid scope issues, use 'base' instead of 'this'
    // to reference this class from internal events and functions.
    var base = {};
    base.$elems = this;

    // Add a reverse reference to the DOM object
    base.$elems.data("gRating", base);

    //Define an output object that will work as a reference
    //for our function
    var output = {
      /* Public functions */
      enable: function(isEnabled)
      { //Enables all stars objects passed in
         base.options.enabled = isEnabled;

         base.$elems.each(function()
         {
           var _this = this;
           _this.$this = $(this);
           _this.$this.children(base.options.elementType).css('cursor', 'default');
           //Reset click count if we are now enabled
           if(isEnabled)
            _this.$this.attr("data-clickCount", 0);
         });
         return base.$elems;
      },
      val: function(index)
      { //Loops through all then returns an object with id or index = value, if only one object passed in returns just the value
        var values = {};
        base.$elems.each(function(key, value)
        {
          var _this = this;
          _this.$this = $(this);
          var id = getUniqueId(_this.$this, key);
          values[id] = _this.$this.attr("value");
       });
       if(Object.keys(values).length == 1)
        values = values[Object.keys(values)[0]];
       if(IsNullOrEmpty(index) == false && values[index] !== undefined)
        values = values[index];
       return values;
      }
    };

    /* Initilise the plugin */
    init();

    /* Private functions */
    // From https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/keys
    if (!Object.keys) {
      Object.keys = (function() {
        'use strict';
        var hasOwnProperty = Object.prototype.hasOwnProperty,
            hasDontEnumBug = !({ toString: null }).propertyIsEnumerable('toString'),
            dontEnums = [
              'toString',
              'toLocaleString',
              'valueOf',
              'hasOwnProperty',
              'isPrototypeOf',
              'propertyIsEnumerable',
              'constructor'
            ],
            dontEnumsLength = dontEnums.length;

        return function(obj) {
          if (typeof obj !== 'object' && (typeof obj !== 'function' || obj === null)) {
            throw new TypeError('Object.keys called on non-object');
          }

          var result = [], prop, i;

          for (prop in obj) {
            if (hasOwnProperty.call(obj, prop)) {
              result.push(prop);
            }
          }

          if (hasDontEnumBug) {
            for (i = 0; i < dontEnumsLength; i++) {
              if (hasOwnProperty.call(obj, dontEnums[i])) {
                result.push(dontEnums[i]);
              }
            }
          }
          return result;
        };
      }());
    }

    /* Initilises the Rating object or checks if it already is initilised if not injects dom elements and adds listeners for events */
    function init()
    {
      //Recursive deep copy of passing in options matching them against the defaults
      base.options = $.extend(true, {}, $.fn.grating.defaultOptions, options);
      base.$elems.each(function(key, value)
      {
        var _this = this;
        _this.$this = $(this);
        _this.$this.data("data-clickCount", 0);

        var count = GetElementCount(_this.$this);
        var character = GetCharacter(_this.$this);
        var required = GetRequired(_this.$this);
        var errorText = GetValidationErrorText(_this.$this);
        /* Check if this is an instantiation of an already initilised element if so exit the init function allowing the caller to chain requests without holding onto a variable */
        if(_this.$this.children(base.options.elementType).length == count)
        {
          return;
        }
        var frag = $(document.createDocumentFragment());
        /* Add components to the parent to enable validation */
        var id = "gRating_validation_input_for_" + getUniqueId(_this.$this, key);
        var inputElement = $("<input type='hidden' id='"+id+"' name='"+id+"' data-error=\""+errorText+"\">");
        if(required)
        {
          inputElement.attr("data-validate", "true");
          inputElement.addClass(base.options.formValidationClass);
          inputElement.attr("required", "required");
          inputElement.attr("data-minlength", "1");
          var helpBlock = $("<div class='help-block with-errors'></div>");
          frag.append(helpBlock);
        }
        frag.append(inputElement);
        for (var i = 1; i < count + 1; i++)
        {
          var characterValue = typeof character === "function" ? GetAwesomeIcon(character(i - 1)) : character;

          var element = $("<"+base.options.elementType+">" + characterValue + "</"+base.options.elementType+">");
          element.data("data-count", i);
          frag.append(element);
        }
        _this.$this.append(frag);
        var children = _this.$this.children(base.options.elementType);
        children.css(base.options.ratingCss);
        /* Hover function if enabled switches between hover and non hover css states */
        children.hover(function(e)
        {
          if(IsEnabled(_this.$this))
          {
            if(e.type === "mouseenter")
              $(this).css(base.options.ratingHoverCss);
            else
              $(this).css(base.options.ratingCss);
          }
        });
        /* Mouse enter for highlighting character under cursor */
        children.mouseenter(function()
        {
          if(IsEnabled(_this.$this))
            populateRatingElements(_this.$this, $(this).data("data-count"));
        });
        /* Click handler for selecting a character if allowed by clicklimit and enabled state */
        children.click(function()
        {
          if(IsEnabled(_this.$this))
          {
            //Increment the Click counter
            _this.$this.data("data-clickCount", parseInt(_this.$this.data("data-clickCount")) + 1);
            //Check if we have a Click Limit and if so whether we've exceeded it, if we have cancel the click event
            if(HasExceededclicklimit(_this.$this))
            {
              //Set disabled state and remove modified cursor if we have exceeded our click limit
              _this.$this.attr('disabled', 'disabled');
              _this.$this.children(base.options.elementType).css('cursor', 'default');
              return;
            }
            var value = $(this).data("data-count");
            // If clicked on the same star again unselect all stars, otherwise there is no way to go to 0 stars after a value had been previously selected
            var deselectable = GetDeselectable(_this.$this);
            if(deselectable && _this.$this.attr("value") == value)
            {
              value = 0;
            }
            _this.$this.attr("value", value);

            /* Set the input field to the current value too, remove it if 0 to allow for validation errors */
            if(value == 0)
              inputElement.removeAttr("value");
            else
              inputElement.attr("value", value);

            populateRatingElements(_this.$this, value);

            if(typeof base.options.callback === "function")
              base.options.callback(_this.$this, value);
          }
        });
        /* Mouseleave on parent element reset back to last clicked element */
        _this.$this.mouseleave(function()
        {
          if(IsEnabled(_this.$this))
            populateRatingElements(_this.$this, _this.$this.attr("value"));
        });
        /* Set initial value for rating */
        var value = GetValue(_this.$this, count);
        _this.$this.attr("value", value);

        /* Only add a value if its above 0 so we can trigger validation errors */
        if(value > 0)
          inputElement.attr("value", value);

        /* Draw the rating with the preselected value visible */
        populateRatingElements(_this.$this, value);

        /* If the parent is disabled default the mouseover icon to the correct state */
        if(IsEnabled(_this.$this) == false)
        {
          _this.$this.children(base.options.elementType).css('cursor', 'default');
        }
      });
    }

    /*
      Attempts to clean dirty input to true or false
      If a value is not caught or recognised will return false
    */
    function GetTrueOrFalse(value)
    {
        if(IsNullOrEmpty(value) == false)
        {
          return (value ==true || value == 1 || value == "true" || value == "1" || value == "t");
        }
        return false;
    }

    /*
      Returns deselectable == "true" if found on the selector data-deselectable
      Returns options.allowDeselect if not found
    */
    function GetDeselectable(selector)
    {

        return typeof selector.attr("data-deselectable") !== "undefined" ? GetTrueOrFalse(selector.attr("data-deselectable")) : base.options.allowDeselect
    }

    /*
      Checks for properties on the selector to find a uniqueKey in the following OnErrorResolvingImageDirectory
      * attribute id
      * attribute name

      If neither was found returns the defaultValue
    */
    function getUniqueId(selector, defaultValue)
    {
      var uniqueKey = "";

      var id = selector.attr("id");
      if(IsNullOrEmpty(id) == false)
      {
        uniqueKey = id;
      }
      else
      {
        var name = selector.attr("name");
        if(IsNullOrEmpty(name) == false)
        {
          uniqueKey = name;
        }
        else
        {
          id = defaultValue;
        }
      }

     return uniqueKey;
    }
    /*
      Convenience function to combine undefined, null and value empty checks
    */
    function IsNullOrEmpty(value)
    {
      return (typeof value === "undefined" || value == "" || value == null);
    }

    /*
      Returns validation data-error content if found on the selector data-error
      Returns options.validationText if not found
    */
    function GetValidationErrorText(selector)
    {
      return typeof selector.attr("data-error") !== "undefined" ? selector.attr("data-error") : base.options.validationText
    }

    /*
      Returns the required state if found on the selector required
      Returns options.required if not found
    */
    function GetRequired(selector)
    {
      return typeof selector.attr("required") !== "undefined" ? selector.attr("required") : base.options.required
    }

    /*
      Gets the current value attribute from the selector
      If the value is undefined returns the defaultValue
      If the value is greater than maxRating value returns the defaultValue
    */
    function GetValue(selector, maxRating)
    {
      var value = selector.attr("value");
      if(IsNullOrEmpty(value))
      {
        value = base.options.defaultValue;
      }
      if(value > maxRating)
      {
        value = 0;
      }
      return value;
    }

    /*
      Checks whether the selector has exceeded the clickCount click limit
      Returns true if so, false otherwise
    */
    function HasExceededclicklimit(selector)
    {
      var limit = Getclicklimit(selector);
      return (limit != 0 && parseInt(selector.data("data-clickCount")) >= limit);
    }

    /*
      Retrieves the Click limit value for the selector
      Returns options.clicklimit if not found
    */
    function Getclicklimit(selector)
    {
      return typeof selector.attr("data-clicklimit") !== "undefined" ? selector.attr("data-clicklimit") : base.options.clicklimit;
    }

    /*
      Retrieves the character value for the selector overriding to the Html data-character value if found first
      Substitues AwesomeIcon html for the character value if the character starts with fa-
      Returns options.character if not found
    */
    function GetCharacter(selector)
    {
      var character = typeof selector.attr("data-character") !== "undefined" ? selector.attr("data-character") : base.options.character;

      //If character starts as a font awesome icon then override and pass out the font awesome icon data
      character = GetAwesomeIcon(character);

      return character;
    }
    
    /*
      Returns the character unmodified unless it starts with fa- then it is assumed to be a font awesome character
      And it is wrapped in a html <i aria-hidden='true'></i> element with the relevant font awesome code
    */
    function GetAwesomeIcon(character)
    {
      //If character starts as a font awesome icon then override and pass out the font awesome icon data
      if(typeof character === "function" == false && character.length > 2 && character.substr(0,3) == "fa-")
      {
        character = "<i class='fa "+character+"' aria-hidden='true'></i>";
      }
      return character;
    }

    /*
      Retrieves the Element count value for the selector overriding to the Html data-max value if found first
      Returns options.elementCount if not found
    */
    function GetElementCount(selector)
    {
      return parseInt(typeof selector.attr("data-max") !== "undefined" ? selector.attr("data-max") : base.options.elementCount)
    }

    /*
      Returns the inverse of the disabled state if found on the selector disabled
      Returns options.enabled if not found
    */
    function IsEnabled(selector)
    {
      return typeof selector.attr("disabled") !== "undefined" ? selector.attr("disabled") == false : base.options.enabled
    }

    /*
      Sets the Css values for all children of the selector up to the value with options.ratingHoverCss otherwise sets options.ratingCss
      Sets all children css to options.ratingCss if value is null
    */
    function populateRatingElements(selector, value)
    {
      selector.children(base.options.elementType).each(function()
      {
        if (IsNullOrEmpty(value) || $(this).data("data-count") > value)
        {
          $(this).css(base.options.ratingCss);
        }
        else
        {
          $(this).css(base.options.ratingHoverCss);
        }
      });
    }

    /* Return the output object result */
    return output;
  };
//Pass the jQuery class so we can use it inside our plugin 'class'
})(jQuery);
