<?php

namespace SuperPHP;

use DOMNode;

class Script extends SuperPHPElement {
      public DOMNode $node;

      /**
       * Script
       * 
       * The script element allows authors to include dynamic script and data blocks in their documents. The element does not represent content for the user.
       *
       * @param SuperPHPElement|null $child
       * @param SuperPHPElement[]|null $children
       * @param CustomAttr[]|null $customAttributes
       * 
       * * Element-specific attributes:
       * @param String|null src	This attribute specifies the URI of an external script; this can be used as an alternative to embedding a script directly within a document.

If a `script` element has a `src` attribute specified, it should not have a script embedded inside its tags.
       * @param String|null $type	This attribute indicates the type of script represented. The value of this attribute will be in one of the following categories:

       *   **Omitted or a JavaScript MIME type:** For HTML5-compliant browsers this indicates the script is JavaScript. HTML5 specification urges authors to omit the attribute rather than provide a redundant MIME type. In earlier browsers, this identified the scripting language of the embedded or imported (via the `src` attribute) code. JavaScript MIME types are [listed in the specification](https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/MIME_types#JavaScript_types).
       *   **`module`:** For HTML5-compliant browsers the code is treated as a JavaScript module. The processing of the script contents is not affected by the `charset` and `defer` attributes. For information on using `module`, see [ES6 in Depth: Modules](https://hacks.mozilla.org/2015/08/es6-in-depth-modules/). Code may behave differently when the `module` keyword is used.
       *   **Any other value:** The embedded content is treated as a data block which won't be processed by the browser. Developers must use a valid MIME type that is not a JavaScript MIME type to denote data blocks. The `src` attribute will be ignored.

       **Note:** in Firefox you could specify the version of JavaScript contained in a `<script>` element by including a non-standard `version` parameter inside the `type` attribute — for example `type="text/javascript;version=1.8"`. This has been removed in Firefox 59 (see [bug 1428745](https://bugzilla.mozilla.org/show_bug.cgi?id=1428745 "FIXED: Remove support for version parameter from script loader")).
       * @param String|null charset	undefined
       * @param String|null async	This is a Boolean attribute indicating that the browser should, if possible, load the script asynchronously.

This attribute must not be used if the `src` attribute is absent (i.e. for inline scripts). If it is included in this case it will have no effect.

Browsers usually assume the worst case scenario and load scripts synchronously, (i.e. `async="false"`) during HTML parsing.

Dynamically inserted scripts (using [`document.createElement()`](https://developer.mozilla.org/en-US/docs/Web/API/Document/createElement "In an HTML document, the document.createElement() method creates the HTML element specified by tagName, or an HTMLUnknownElement if tagName isn't recognized.")) load asynchronously by default, so to turn on synchronous loading (i.e. scripts load in the order they were inserted) set `async="false"`.

See [Browser compatibility](#Browser_compatibility) for notes on browser support. See also [Async scripts for asm.js](https://developer.mozilla.org/en-US/docs/Games/Techniques/Async_scripts).
       * @param String|null defer	This Boolean attribute is set to indicate to a browser that the script is meant to be executed after the document has been parsed, but before firing [`DOMContentLoaded`](https://developer.mozilla.org/en-US/docs/Web/Events/DOMContentLoaded "/en-US/docs/Web/Events/DOMContentLoaded").

Scripts with the `defer` attribute will prevent the `DOMContentLoaded` event from firing until the script has loaded and finished evaluating.

This attribute must not be used if the `src` attribute is absent (i.e. for inline scripts), in this case it would have no effect.

To achieve a similar effect for dynamically inserted scripts use `async="false"` instead. Scripts with the `defer` attribute will execute in the order in which they appear in the document.
       * @param String|null crossorigin	Normal `script` elements pass minimal information to the [`window.onerror`](https://developer.mozilla.org/en-US/docs/Web/API/GlobalEventHandlers/onerror "The onerror property of the GlobalEventHandlers mixin is an EventHandler that processes error events.") for scripts which do not pass the standard [CORS](https://developer.mozilla.org/en-US/docs/Glossary/CORS "CORS: CORS (Cross-Origin Resource Sharing) is a system, consisting of transmitting HTTP headers, that determines whether browsers block frontend JavaScript code from accessing responses for cross-origin requests.") checks. To allow error logging for sites which use a separate domain for static media, use this attribute. See [CORS settings attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/CORS_settings_attributes) for a more descriptive explanation of its valid arguments.
       * @param String|null nonce	A cryptographic nonce (number used once) to whitelist inline scripts in a [script-src Content-Security-Policy](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/script-src). The server must generate a unique nonce value each time it transmits a policy. It is critical to provide a nonce that cannot be guessed as bypassing a resource's policy is otherwise trivial.
       * @param String|null integrity	undefined
       * @param String|null nomodule	undefined
       * @param String|null referrerpolicy	undefined
       * @param String|null text	undefined
       * 
       * * Global attributes:
       * @param String|null $accesskey	Provides a hint for generating a keyboard shortcut for the current element. This attribute consists of a space-separated list of characters. The browser should use the first one that exists on the computer keyboard layout.
       * @param String|null autocapitalize	Controls whether and how text input is automatically capitalized as it is entered/edited by the user. It can have the following values:

       *   `off` or `none`, no autocapitalization is applied (all letters default to lowercase)
       *   `on` or `sentences`, the first letter of each sentence defaults to a capital letter; all other letters default to lowercase
       *   `words`, the first letter of each word defaults to a capital letter; all other letters default to lowercase
       *   `characters`, all letters should default to uppercase
       * @param String[]|null $class	A space-separated list of the classes of the element. Classes allows CSS and JavaScript to select and access specific elements via the [class selectors](https://developer.mozilla.org/docs/Web/CSS/Class_selectors) or functions like the method [`Document.getElementsByClassName()`](https://developer.mozilla.org/docs/Web/API/Document/getElementsByClassName "returns an array-like object of all child elements which have all of the given class names.").
       * @param String|null $contenteditable	An enumerated attribute indicating if the element should be editable by the user. If so, the browser modifies its widget to allow editing. The attribute must take one of the following values:

       *   `true` or the _empty string_, which indicates that the element must be editable;
       *   `false`, which indicates that the element must not be editable.
       * @param String|null contextmenu	The `[**id**](#attr-id)` of a [`<menu>`](https://developer.mozilla.org/docs/Web/HTML/Element/menu "The HTML <menu> element represents a group of commands that a user can perform or activate. This includes both list menus, which might appear across the top of a screen, as well as context menus, such as those that might appear underneath a button after it has been clicked.") to use as the contextual menu for this element.
       * @param String|null $dir	An enumerated attribute indicating the directionality of the element's text. It can have the following values:

       *   `ltr`, which means _left to right_ and is to be used for languages that are written from the left to the right (like English);
       *   `rtl`, which means _right to left_ and is to be used for languages that are written from the right to the left (like Arabic);
       *   `auto`, which lets the user agent decide. It uses a basic algorithm as it parses the characters inside the element until it finds a character with a strong directionality, then it applies that directionality to the whole element.
       * @param String|null draggable	An enumerated attribute indicating whether the element can be dragged, using the [Drag and Drop API](https://developer.mozilla.org/docs/DragDrop/Drag_and_Drop). It can have the following values:

       *   `true`, which indicates that the element may be dragged
       *   `false`, which indicates that the element may not be dragged.
       * @param String|null $dropzone	An enumerated attribute indicating what types of content can be dropped on an element, using the [Drag and Drop API](https://developer.mozilla.org/docs/DragDrop/Drag_and_Drop). It can have the following values:

       *   `copy`, which indicates that dropping will create a copy of the element that was dragged
       *   `move`, which indicates that the element that was dragged will be moved to this new location.
       *   `link`, will create a link to the dragged data.
       * @param String|null $exportparts	Used to transitively export shadow parts from a nested shadow tree into a containing light tree.
       * @param String|null $hidden	A Boolean attribute indicates that the element is not yet, or is no longer, _relevant_. For example, it can be used to hide elements of the page that can't be used until the login process has been completed. The browser won't render such elements. This attribute must not be used to hide content that could legitimately be shown.
       * @param String|null $id	Defines a unique identifier (ID) which must be unique in the whole document. Its purpose is to identify the element when linking (using a fragment identifier), scripting, or styling (with CSS).
       * @param String|null inputmode	Provides a hint to browsers as to the type of virtual keyboard configuration to use when editing this element or its contents. Used primarily on [`<input>`](https://developer.mozilla.org/docs/Web/HTML/Element/input "The HTML <input> element is used to create interactive controls for web-based forms in order to accept data from the user; a wide variety of types of input data and control widgets are available, depending on the device and user agent.") elements, but is usable on any element while in `[contenteditable](https://developer.mozilla.org/docs/Web/HTML/Global_attributes#attr-contenteditable)` mode.
       * @param String|null is	Allows you to specify that a standard HTML element should behave like a registered custom built-in element (see [Using custom elements](https://developer.mozilla.org/docs/Web/Web_Components/Using_custom_elements) for more details).
       * @param String|null itemid	The unique, global identifier of an item.
       * @param String|null itemprop	Used to add properties to an item. Every HTML element may have an `itemprop` attribute specified, where an `itemprop` consists of a name and value pair.
       * @param String|null itemref	Properties that are not descendants of an element with the `itemscope` attribute can be associated with the item using an `itemref`. It provides a list of element ids (not `itemid`s) with additional properties elsewhere in the document.
       * @param String|null itemscope	`itemscope` (usually) works along with `[itemtype](https://developer.mozilla.org/docs/Web/HTML/Global_attributes#attr-itemtype)` to specify that the HTML contained in a block is about a particular item. `itemscope` creates the Item and defines the scope of the `itemtype` associated with it. `itemtype` is a valid URL of a vocabulary (such as [schema.org](https://schema.org/)) that describes the item and its properties context.
       * @param String|null itemtype	Specifies the URL of the vocabulary that will be used to define `itemprop`s (item properties) in the data structure. `[itemscope](https://developer.mozilla.org/docs/Web/HTML/Global_attributes#attr-itemscope)` is used to set the scope of where in the data structure the vocabulary set by `itemtype` will be active.
       * @param String|null lang	Helps define the language of an element: the language that non-editable elements are in, or the language that editable elements should be written in by the user. The attribute contains one “language tag” (made of hyphen-separated “language subtags”) in the format defined in [_Tags for Identifying Languages (BCP47)_](https://www.ietf.org/rfc/bcp/bcp47.txt). [**xml:lang**](#attr-xml:lang) has priority over it.
       * @param String|null part	A space-separated list of the part names of the element. Part names allows CSS to select and style specific elements in a shadow tree via the [`::part`](https://developer.mozilla.org/docs/Web/CSS/::part "The ::part CSS pseudo-element represents any element within a shadow tree that has a matching part attribute.") pseudo-element.
       * @param String|null role	undefined
       * @param String|null slot	Assigns a slot in a [shadow DOM](https://developer.mozilla.org/docs/Web/Web_Components/Shadow_DOM) shadow tree to an element: An element with a `slot` attribute is assigned to the slot created by the [`<slot>`](https://developer.mozilla.org/docs/Web/HTML/Element/slot "The HTML <slot> element—part of the Web Components technology suite—is a placeholder inside a web component that you can fill with your own markup, which lets you create separate DOM trees and present them together.") element whose `[name](https://developer.mozilla.org/docs/Web/HTML/Element/slot#attr-name)` attribute's value matches that `slot` attribute's value.
       * @param String|null spellcheck	An enumerated attribute defines whether the element may be checked for spelling errors. It may have the following values:

       *   `true`, which indicates that the element should be, if possible, checked for spelling errors;
       *   `false`, which indicates that the element should not be checked for spelling errors.
       * @param String|null style	Contains [CSS](https://developer.mozilla.org/docs/Web/CSS) styling declarations to be applied to the element. Note that it is recommended for styles to be defined in a separate file or files. This attribute and the [`<style>`](https://developer.mozilla.org/docs/Web/HTML/Element/style "The HTML <style> element contains style information for a document, or part of a document.") element have mainly the purpose of allowing for quick styling, for example for testing purposes.
       * @param String|null tabindex	An integer attribute indicating if the element can take input focus (is _focusable_), if it should participate to sequential keyboard navigation, and if so, at what position. It can take several values:

       *   a _negative value_ means that the element should be focusable, but should not be reachable via sequential keyboard navigation;
       *   `0` means that the element should be focusable and reachable via sequential keyboard navigation, but its relative order is defined by the platform convention;
       *   a _positive value_ means that the element should be focusable and reachable via sequential keyboard navigation; the order in which the elements are focused is the increasing value of the [**tabindex**](#attr-tabindex). If several elements share the same tabindex, their relative order follows their relative positions in the document.
       * @param String|null title	Contains a text representing advisory information related to the element it belongs to. Such information can typically, but not necessarily, be presented to the user as a tooltip.
       * @param String|null translate	An enumerated attribute that is used to specify whether an element's attribute values and the values of its [`Text`](https://developer.mozilla.org/docs/Web/API/Text "The Text interface represents the textual content of Element or Attr. If an element has no markup within its content, it has a single child implementing Text that contains the element's text. However, if the element contains markup, it is parsed into information items and Text nodes that form its children.") node children are to be translated when the page is localized, or whether to leave them unchanged. It can have the following values:

       *   empty string and `yes`, which indicates that the element will be translated.
       *   `no`, which indicates that the element will not be translated.
       * @param String|null onabort	The loading of a resource has been aborted.
       * @param String|null onblur	An element has lost focus (does not bubble).
       * @param String|null oncanplay	The user agent can play the media, but estimates that not enough data has been loaded to play the media up to its end without having to stop for further buffering of content.
       * @param String|null oncanplaythrough	The user agent can play the media up to its end without having to stop for further buffering of content.
       * @param String|null onchange	The change event is fired for <input>, <select>, and <textarea> elements when a change to the element's value is committed by the user.
       * @param String|null onclick	A pointing device button has been pressed and released on an element.
       * @param String|null oncontextmenu	The right button of the mouse is clicked (before the context menu is displayed).
       * @param String|null ondblclick	A pointing device button is clicked twice on an element.
       * @param String|null ondrag	An element or text selection is being dragged (every 350ms).
       * @param String|null ondragend	A drag operation is being ended (by releasing a mouse button or hitting the escape key).
       * @param String|null ondragenter	A dragged element or text selection enters a valid drop target.
       * @param String|null ondragleave	A dragged element or text selection leaves a valid drop target.
       * @param String|null ondragover	An element or text selection is being dragged over a valid drop target (every 350ms).
       * @param String|null ondragstart	The user starts dragging an element or text selection.
       * @param String|null ondrop	An element is dropped on a valid drop target.
       * @param String|null ondurationchange	The duration attribute has been updated.
       * @param String|null onemptied	The media has become empty; for example, this event is sent if the media has already been loaded (or partially loaded), and the load() method is called to reload it.
       * @param String|null onended	Playback has stopped because the end of the media was reached.
       * @param String|null onerror	A resource failed to load.
       * @param String|null onfocus	An element has received focus (does not bubble).
       * @param String|null onformchange	undefined
       * @param String|null onforminput	undefined
       * @param String|null oninput	The value of an element changes or the content of an element with the attribute contenteditable is modified.
       * @param String|null oninvalid	A submittable element has been checked and doesn't satisfy its constraints.
       * @param String|null onkeydown	A key is pressed down.
       * @param String|null onkeypress	A key is pressed down and that key normally produces a character value (use input instead).
       * @param String|null onkeyup	A key is released.
       * @param String|null onload	A resource and its dependent resources have finished loading.
       * @param String|null onloadeddata	The first frame of the media has finished loading.
       * @param String|null onloadedmetadata	The metadata has been loaded.
       * @param String|null onloadstart	Progress has begun.
       * @param String|null onmousedown	A pointing device button (usually a mouse) is pressed on an element.
       * @param String|null onmousemove	A pointing device is moved over an element.
       * @param String|null onmouseout	A pointing device is moved off the element that has the listener attached or off one of its children.
       * @param String|null onmouseover	A pointing device is moved onto the element that has the listener attached or onto one of its children.
       * @param String|null onmouseup	A pointing device button is released over an element.
       * @param String|null onmousewheel	undefined
       * @param String|null onmouseenter	A pointing device is moved onto the element that has the listener attached.
       * @param String|null onmouseleave	A pointing device is moved off the element that has the listener attached.
       * @param String|null onpause	Playback has been paused.
       * @param String|null onplay	Playback has begun.
       * @param String|null onplaying	Playback is ready to start after having been paused or delayed due to lack of data.
       * @param String|null onprogress	In progress.
       * @param String|null onratechange	The playback rate has changed.
       * @param String|null onreset	A form is reset.
       * @param String|null onresize	The document view has been resized.
       * @param String|null onreadystatechange	The readyState attribute of a document has changed.
       * @param String|null onscroll	The document view or an element has been scrolled.
       * @param String|null onseeked	A seek operation completed.
       * @param String|null onseeking	A seek operation began.
       * @param String|null onselect	Some text is being selected.
       * @param String|null onshow	A contextmenu event was fired on/bubbled to an element that has a contextmenu attribute
       * @param String|null onstalled	The user agent is trying to fetch media data, but data is unexpectedly not forthcoming.
       * @param String|null onsubmit	A form is submitted.
       * @param String|null onsuspend	Media data loading has been suspended.
       * @param String|null ontimeupdate	The time indicated by the currentTime attribute has been updated.
       * @param String|null onvolumechange	The volume has changed.
       * @param String|null onwaiting	Playback has stopped because of a temporary lack of data.
       * @param String|null onpointercancel	The pointer is unlikely to produce any more events.
       * @param String|null onpointerdown	The pointer enters the active buttons state.
       * @param String|null onpointerenter	Pointing device is moved inside the hit-testing boundary.
       * @param String|null onpointerleave	Pointing device is moved out of the hit-testing boundary.
       * @param String|null onpointerlockchange	The pointer was locked or released.
       * @param String|null onpointerlockerror	It was impossible to lock the pointer for technical reasons or because the permission was denied.
       * @param String|null onpointermove	The pointer changed coordinates.
       * @param String|null onpointerout	The pointing device moved out of hit-testing boundary or leaves detectable hover range.
       * @param String|null onpointerover	The pointing device is moved into the hit-testing boundary.
       * @param String|null onpointerup	The pointer leaves the active buttons state.
       * @param String|null ariaActivedescendant	Identifies the currently active element when DOM focus is on a [`composite`](https://www.w3.org/TR/wai-aria-1.1/#composite) widget, [`textbox`](https://www.w3.org/TR/wai-aria-1.1/#textbox), [`group`](https://www.w3.org/TR/wai-aria-1.1/#group), or [`application`](https://www.w3.org/TR/wai-aria-1.1/#application).
       * @param String|null ariaAtomic	Indicates whether [assistive technologies](https://www.w3.org/TR/wai-aria-1.1/#dfn-assistive-technology) will present all, or only parts of, the changed region based on the change notifications defined by the [`aria-relevant`](https://www.w3.org/TR/wai-aria-1.1/#aria-relevant) attribute.
       * @param String|null ariaAutocomplete	Indicates whether inputting text could trigger display of one or more predictions of the user's intended value for an input and specifies how predictions would be presented if they are made.
       * @param String|null ariaBusy	Indicates an element is being modified and that assistive technologies _MAY_ want to wait until the modifications are complete before exposing them to the user.
       * @param String|null ariaChecked	Indicates the current "checked" [state](https://www.w3.org/TR/wai-aria-1.1/#dfn-state) of checkboxes, radio buttons, and other [widgets](https://www.w3.org/TR/wai-aria-1.1/#dfn-widget). See related [`aria-pressed`](https://www.w3.org/TR/wai-aria-1.1/#aria-pressed) and [`aria-selected`](https://www.w3.org/TR/wai-aria-1.1/#aria-selected).
       * @param String|null ariaColcount	Defines the total number of columns in a [`table`](https://www.w3.org/TR/wai-aria-1.1/#table), [`grid`](https://www.w3.org/TR/wai-aria-1.1/#grid), or [`treegrid`](https://www.w3.org/TR/wai-aria-1.1/#treegrid). See related [`aria-colindex`](https://www.w3.org/TR/wai-aria-1.1/#aria-colindex).
       * @param String|null ariaColindex	Defines an [element's](https://www.w3.org/TR/wai-aria-1.1/#dfn-element) column index or position with respect to the total number of columns within a [`table`](https://www.w3.org/TR/wai-aria-1.1/#table), [`grid`](https://www.w3.org/TR/wai-aria-1.1/#grid), or [`treegrid`](https://www.w3.org/TR/wai-aria-1.1/#treegrid). See related [`aria-colcount`](https://www.w3.org/TR/wai-aria-1.1/#aria-colcount) and [`aria-colspan`](https://www.w3.org/TR/wai-aria-1.1/#aria-colspan).
       * @param String|null ariaColspan	Defines the number of columns spanned by a cell or gridcell within a [`table`](https://www.w3.org/TR/wai-aria-1.1/#table), [`grid`](https://www.w3.org/TR/wai-aria-1.1/#grid), or [`treegrid`](https://www.w3.org/TR/wai-aria-1.1/#treegrid). See related [`aria-colindex`](https://www.w3.org/TR/wai-aria-1.1/#aria-colindex) and [`aria-rowspan`](https://www.w3.org/TR/wai-aria-1.1/#aria-rowspan).
       * @param String|null ariaControls	Identifies the [element](https://www.w3.org/TR/wai-aria-1.1/#dfn-element) (or elements) whose contents or presence are controlled by the current element. See related [`aria-owns`](https://www.w3.org/TR/wai-aria-1.1/#aria-owns).
       * @param String|null ariaCurrent	Indicates the [element](https://www.w3.org/TR/wai-aria-1.1/#dfn-element) that represents the current item within a container or set of related elements.
       * @param String|null ariaDescribedby	Identifies the [element](https://www.w3.org/TR/wai-aria-1.1/#dfn-element) (or elements) that describes the [object](https://www.w3.org/TR/wai-aria-1.1/#dfn-object). See related [`aria-labelledby`](https://www.w3.org/TR/wai-aria-1.1/#aria-labelledby).
       * @param String|null ariaDisabled	Indicates that the [element](https://www.w3.org/TR/wai-aria-1.1/#dfn-element) is [perceivable](https://www.w3.org/TR/wai-aria-1.1/#dfn-perceivable) but disabled, so it is not editable or otherwise [operable](https://www.w3.org/TR/wai-aria-1.1/#dfn-operable). See related [`aria-hidden`](https://www.w3.org/TR/wai-aria-1.1/#aria-hidden) and [`aria-readonly`](https://www.w3.org/TR/wai-aria-1.1/#aria-readonly).
       * @param String|null ariaDropeffect	\[Deprecated in ARIA 1.1\] Indicates what functions can be performed when a dragged object is released on the drop target.
       * @param String|null ariaErrormessage	Identifies the [element](https://www.w3.org/TR/wai-aria-1.1/#dfn-element) that provides an error message for the [object](https://www.w3.org/TR/wai-aria-1.1/#dfn-object). See related [`aria-invalid`](https://www.w3.org/TR/wai-aria-1.1/#aria-invalid) and [`aria-describedby`](https://www.w3.org/TR/wai-aria-1.1/#aria-describedby).
       * @param String|null ariaExpanded	Indicates whether the element, or another grouping element it controls, is currently expanded or collapsed.
       * @param String|null ariaFlowto	Identifies the next [element](https://www.w3.org/TR/wai-aria-1.1/#dfn-element) (or elements) in an alternate reading order of content which, at the user's discretion, allows assistive technology to override the general default of reading in document source order.
       * @param String|null ariaGrabbed	\[Deprecated in ARIA 1.1\] Indicates an element's "grabbed" [state](https://www.w3.org/TR/wai-aria-1.1/#dfn-state) in a drag-and-drop operation.
       * @param String|null ariaHaspopup	Indicates the availability and type of interactive popup element, such as menu or dialog, that can be triggered by an [element](https://www.w3.org/TR/wai-aria-1.1/#dfn-element).
       * @param String|null ariaHidden	Indicates whether the [element](https://www.w3.org/TR/wai-aria-1.1/#dfn-element) is exposed to an accessibility API. See related [`aria-disabled`](https://www.w3.org/TR/wai-aria-1.1/#aria-disabled).
       * @param String|null ariaInvalid	Indicates the entered value does not conform to the format expected by the application. See related [`aria-errormessage`](https://www.w3.org/TR/wai-aria-1.1/#aria-errormessage).
       * @param String|null ariaLabel	Defines a string value that labels the current element. See related [`aria-labelledby`](https://www.w3.org/TR/wai-aria-1.1/#aria-labelledby).
       * @param String|null ariaLabelledby	Identifies the [element](https://www.w3.org/TR/wai-aria-1.1/#dfn-element) (or elements) that labels the current element. See related [`aria-describedby`](https://www.w3.org/TR/wai-aria-1.1/#aria-describedby).
       * @param String|null ariaLevel	Defines the hierarchical level of an [element](https://www.w3.org/TR/wai-aria-1.1/#dfn-element) within a structure.
       * @param String|null ariaLive	Indicates that an [element](https://www.w3.org/TR/wai-aria-1.1/#dfn-element) will be updated, and describes the types of updates the [user agents](https://www.w3.org/TR/wai-aria-1.1/#dfn-user-agent), [assistive technologies](https://www.w3.org/TR/wai-aria-1.1/#dfn-assistive-technology), and user can expect from the [live region](https://www.w3.org/TR/wai-aria-1.1/#dfn-live-region).
       * @param String|null ariaModal	Indicates whether an [element](https://www.w3.org/TR/wai-aria-1.1/#dfn-element) is modal when displayed.
       * @param String|null ariaMultiline	Indicates whether a text box accepts multiple lines of input or only a single line.
       * @param String|null ariaMultiselectable	Indicates that the user may select more than one item from the current selectable descendants.
       * @param String|null ariaOrientation	Indicates whether the element's orientation is horizontal, vertical, or unknown/ambiguous.
       * @param String|null ariaOwns	Identifies an [element](https://www.w3.org/TR/wai-aria-1.1/#dfn-element) (or elements) in order to define a visual, functional, or contextual parent/child [relationship](https://www.w3.org/TR/wai-aria-1.1/#dfn-relationship) between DOM elements where the DOM hierarchy cannot be used to represent the relationship. See related [`aria-controls`](https://www.w3.org/TR/wai-aria-1.1/#aria-controls).
       * @param String|null ariaPlaceholder	Defines a short hint (a word or short phrase) intended to aid the user with data entry when the control has no value. A hint could be a sample value or a brief description of the expected format.
       * @param String|null ariaPosinset	Defines an [element](https://www.w3.org/TR/wai-aria-1.1/#dfn-element)'s number or position in the current set of listitems or treeitems. Not required if all elements in the set are present in the DOM. See related [`aria-setsize`](https://www.w3.org/TR/wai-aria-1.1/#aria-setsize).
       * @param String|null ariaPressed	Indicates the current "pressed" [state](https://www.w3.org/TR/wai-aria-1.1/#dfn-state) of toggle buttons. See related [`aria-checked`](https://www.w3.org/TR/wai-aria-1.1/#aria-checked) and [`aria-selected`](https://www.w3.org/TR/wai-aria-1.1/#aria-selected).
       * @param String|null ariaReadonly	Indicates that the [element](https://www.w3.org/TR/wai-aria-1.1/#dfn-element) is not editable, but is otherwise [operable](https://www.w3.org/TR/wai-aria-1.1/#dfn-operable). See related [`aria-disabled`](https://www.w3.org/TR/wai-aria-1.1/#aria-disabled).
       * @param String|null ariaRelevant	Indicates what notifications the user agent will trigger when the accessibility tree within a live region is modified. See related [`aria-atomic`](https://www.w3.org/TR/wai-aria-1.1/#aria-atomic).
       * @param String|null ariaRequired	Indicates that user input is required on the [element](https://www.w3.org/TR/wai-aria-1.1/#dfn-element) before a form may be submitted.
       * @param String|null ariaRoledescription	Defines a human-readable, author-localized description for the [role](https://www.w3.org/TR/wai-aria-1.1/#dfn-role) of an [element](https://www.w3.org/TR/wai-aria-1.1/#dfn-element).
       * @param String|null ariaRowcount	Defines the total number of rows in a [`table`](https://www.w3.org/TR/wai-aria-1.1/#table), [`grid`](https://www.w3.org/TR/wai-aria-1.1/#grid), or [`treegrid`](https://www.w3.org/TR/wai-aria-1.1/#treegrid). See related [`aria-rowindex`](https://www.w3.org/TR/wai-aria-1.1/#aria-rowindex).
       * @param String|null ariaRowindex	Defines an [element's](https://www.w3.org/TR/wai-aria-1.1/#dfn-element) row index or position with respect to the total number of rows within a [`table`](https://www.w3.org/TR/wai-aria-1.1/#table), [`grid`](https://www.w3.org/TR/wai-aria-1.1/#grid), or [`treegrid`](https://www.w3.org/TR/wai-aria-1.1/#treegrid). See related [`aria-rowcount`](https://www.w3.org/TR/wai-aria-1.1/#aria-rowcount) and [`aria-rowspan`](https://www.w3.org/TR/wai-aria-1.1/#aria-rowspan).
       * @param String|null ariaRowspan	Defines the number of rows spanned by a cell or gridcell within a [`table`](https://www.w3.org/TR/wai-aria-1.1/#table), [`grid`](https://www.w3.org/TR/wai-aria-1.1/#grid), or [`treegrid`](https://www.w3.org/TR/wai-aria-1.1/#treegrid). See related [`aria-rowindex`](https://www.w3.org/TR/wai-aria-1.1/#aria-rowindex) and [`aria-colspan`](https://www.w3.org/TR/wai-aria-1.1/#aria-colspan).
       * @param String|null ariaSelected	Indicates the current "selected" [state](https://www.w3.org/TR/wai-aria-1.1/#dfn-state) of various [widgets](https://www.w3.org/TR/wai-aria-1.1/#dfn-widget). See related [`aria-checked`](https://www.w3.org/TR/wai-aria-1.1/#aria-checked) and [`aria-pressed`](https://www.w3.org/TR/wai-aria-1.1/#aria-pressed).
       * @param String|null ariaSetsize	Defines the number of items in the current set of listitems or treeitems. Not required if all elements in the set are present in the DOM. See related [`aria-posinset`](https://www.w3.org/TR/wai-aria-1.1/#aria-posinset).
       * @param String|null ariaSort	Indicates if items in a table or grid are sorted in ascending or descending order.
       * @param String|null ariaValuemax	Defines the maximum allowed value for a range [widget](https://www.w3.org/TR/wai-aria-1.1/#dfn-widget).
       * @param String|null ariaValuemin	Defines the minimum allowed value for a range [widget](https://www.w3.org/TR/wai-aria-1.1/#dfn-widget).
       * @param String|null ariaValuenow	Defines the current value for a range [widget](https://www.w3.org/TR/wai-aria-1.1/#dfn-widget). See related [`aria-valuetext`](https://www.w3.org/TR/wai-aria-1.1/#aria-valuetext).
       * @param String|null ariaValuetext	Defines the human readable text alternative of [`aria-valuenow`](https://www.w3.org/TR/wai-aria-1.1/#aria-valuenow) for a range [widget](https://www.w3.org/TR/wai-aria-1.1/#dfn-widget).
       * @param String|null ariaDetails	Identifies the [element](https://www.w3.org/TR/wai-aria-1.1/#dfn-element) that provides a detailed, extended description for the [object](https://www.w3.org/TR/wai-aria-1.1/#dfn-object). See related [`aria-describedby`](https://www.w3.org/TR/wai-aria-1.1/#aria-describedby).
       * @param String|null ariaKeyshortcuts	Indicates keyboard shortcuts that an author has implemented to activate or give focus to an element.
       * 
       * @author Jishnu Raj <jishnurajpp2@email.com>
       * @version 1.0.0 - 11 September 2022
       */
      function __construct(
            public ?SuperPHPElement $child = null,
            public ?array $children = null,
            public ?array $customAttributes = null,

            // Element-specific attributes:
            String $src = null,
            String $type = null,
            String $charset = null,
            String $async = null,
            String $defer = null,
            String $crossorigin = null,
            String $nonce = null,
            String $integrity = null,
            String $nomodule = null,
            String $referrerpolicy = null,
            String $text = null,

            // Global attributes
            String $accesskey = null,
            String $autocapitalize = null,
            String $class = null,
            String $contenteditable = null,
            String $contextmenu = null,
            String $dir = null,
            String $draggable = null,
            String $dropzone = null,
            String $exportparts = null,
            String $hidden = null,
            String $id = null,
            String $inputmode = null,
            String $is = null,
            String $itemid = null,
            String $itemprop = null,
            String $itemref = null,
            String $itemscope = null,
            String $itemtype = null,
            String $lang = null,
            String $part = null,
            String $role = null,
            String $slot = null,
            String $spellcheck = null,
            String $style = null,
            String $tabindex = null,
            String $title = null,
            String $translate = null,
            String $onabort = null,
            String $onblur = null,
            String $oncanplay = null,
            String $oncanplaythrough = null,
            String $onchange = null,
            String $onclick = null,
            String $oncontextmenu = null,
            String $ondblclick = null,
            String $ondrag = null,
            String $ondragend = null,
            String $ondragenter = null,
            String $ondragleave = null,
            String $ondragover = null,
            String $ondragstart = null,
            String $ondrop = null,
            String $ondurationchange = null,
            String $onemptied = null,
            String $onended = null,
            String $onerror = null,
            String $onfocus = null,
            String $onformchange = null,
            String $onforminput = null,
            String $oninput = null,
            String $oninvalid = null,
            String $onkeydown = null,
            String $onkeypress = null,
            String $onkeyup = null,
            String $onload = null,
            String $onloadeddata = null,
            String $onloadedmetadata = null,
            String $onloadstart = null,
            String $onmousedown = null,
            String $onmousemove = null,
            String $onmouseout = null,
            String $onmouseover = null,
            String $onmouseup = null,
            String $onmousewheel = null,
            String $onmouseenter = null,
            String $onmouseleave = null,
            String $onpause = null,
            String $onplay = null,
            String $onplaying = null,
            String $onprogress = null,
            String $onratechange = null,
            String $onreset = null,
            String $onresize = null,
            String $onreadystatechange = null,
            String $onscroll = null,
            String $onseeked = null,
            String $onseeking = null,
            String $onselect = null,
            String $onshow = null,
            String $onstalled = null,
            String $onsubmit = null,
            String $onsuspend = null,
            String $ontimeupdate = null,
            String $onvolumechange = null,
            String $onwaiting = null,
            String $onpointercancel = null,
            String $onpointerdown = null,
            String $onpointerenter = null,
            String $onpointerleave = null,
            String $onpointerlockchange = null,
            String $onpointerlockerror = null,
            String $onpointermove = null,
            String $onpointerout = null,
            String $onpointerover = null,
            String $onpointerup = null,
            String $ariaActivedescendant = null,
            String $ariaAtomic = null,
            String $ariaAutocomplete = null,
            String $ariaBusy = null,
            String $ariaChecked = null,
            String $ariaColcount = null,
            String $ariaColindex = null,
            String $ariaColspan = null,
            String $ariaControls = null,
            String $ariaCurrent = null,
            String $ariaDescribedby = null,
            String $ariaDisabled = null,
            String $ariaDropeffect = null,
            String $ariaErrormessage = null,
            String $ariaExpanded = null,
            String $ariaFlowto = null,
            String $ariaGrabbed = null,
            String $ariaHaspopup = null,
            String $ariaHidden = null,
            String $ariaInvalid = null,
            String $ariaLabel = null,
            String $ariaLabelledby = null,
            String $ariaLevel = null,
            String $ariaLive = null,
            String $ariaModal = null,
            String $ariaMultiline = null,
            String $ariaMultiselectable = null,
            String $ariaOrientation = null,
            String $ariaOwns = null,
            String $ariaPlaceholder = null,
            String $ariaPosinset = null,
            String $ariaPressed = null,
            String $ariaReadonly = null,
            String $ariaRelevant = null,
            String $ariaRequired = null,
            String $ariaRoledescription = null,
            String $ariaRowcount = null,
            String $ariaRowindex = null,
            String $ariaRowspan = null,
            String $ariaSelected = null,
            String $ariaSetsize = null,
            String $ariaSort = null,
            String $ariaValuemax = null,
            String $ariaValuemin = null,
            String $ariaValuenow = null,
            String $ariaValuetext = null,
            String $ariaDetails = null,
            String $ariaKeyshortcuts = null,
      ) {

            parent::__construct();
            $this->node = self::$dom->createElement("script");
            if ($child) $this->node->appendChild($child->node->cloneNode(true));
            if ($children) {
                  foreach ($children as $child) {
                        $this->node->appendChild($child->node->cloneNode(true));
                  }
            }
            if ($customAttributes) {
                  foreach ($customAttributes as $attr) {
                        $this->node->setAttribute($attr->name, $attr->value);
                  }
            }

            // Element-specific attributes
            if ($src) $this->node->setAttribute("src", $src);
            if ($type) $this->node->setAttribute("type", $type);
            if ($charset) $this->node->setAttribute("charset", $charset);
            if ($async) $this->node->setAttribute("async", $async);
            if ($defer) $this->node->setAttribute("defer", $defer);
            if ($crossorigin) $this->node->setAttribute("crossorigin", $crossorigin);
            if ($nonce) $this->node->setAttribute("nonce", $nonce);
            if ($integrity) $this->node->setAttribute("integrity", $integrity);
            if ($nomodule) $this->node->setAttribute("nomodule", $nomodule);
            if ($referrerpolicy) $this->node->setAttribute("referrerpolicy", $referrerpolicy);
            if ($text) $this->node->setAttribute("text", $text);

            // Global attributes
            if ($accesskey) $this->node->setAttribute("accesskey", $accesskey);
            if ($autocapitalize) $this->node->setAttribute("autocapitalize", $autocapitalize);
            if ($class) $this->node->setAttribute("class", implode(" ", $class));
            if ($contenteditable) $this->node->setAttribute("contenteditable", $contenteditable);
            if ($contextmenu) $this->node->setAttribute("contextmenu", $contextmenu);
            if ($dir) $this->node->setAttribute("dir", $dir);
            if ($draggable) $this->node->setAttribute("draggable", $draggable);
            if ($dropzone) $this->node->setAttribute("dropzone", $dropzone);
            if ($exportparts) $this->node->setAttribute("exportparts", $exportparts);
            if ($hidden) $this->node->setAttribute("hidden", $hidden);
            if ($id) $this->node->setAttribute("id", $id);
            if ($inputmode) $this->node->setAttribute("inputmode", $inputmode);
            if ($is) $this->node->setAttribute("is", $is);
            if ($itemid) $this->node->setAttribute("itemid", $itemid);
            if ($itemprop) $this->node->setAttribute("itemprop", $itemprop);
            if ($itemref) $this->node->setAttribute("itemref", $itemref);
            if ($itemscope) $this->node->setAttribute("itemscope", $itemscope);
            if ($itemtype) $this->node->setAttribute("itemtype", $itemtype);
            if ($lang) $this->node->setAttribute("lang", $lang);
            if ($part) $this->node->setAttribute("part", $part);
            if ($role) $this->node->setAttribute("role", $role);
            if ($slot) $this->node->setAttribute("slot", $slot);
            if ($spellcheck) $this->node->setAttribute("spellcheck", $spellcheck);
            if ($style) $this->node->setAttribute("style", $style);
            if ($tabindex) $this->node->setAttribute("tabindex", $tabindex);
            if ($title) $this->node->setAttribute("title", $title);
            if ($translate) $this->node->setAttribute("translate", $translate);
            if ($onabort) $this->node->setAttribute("onabort", $onabort);
            if ($onblur) $this->node->setAttribute("onblur", $onblur);
            if ($oncanplay) $this->node->setAttribute("oncanplay", $oncanplay);
            if ($oncanplaythrough) $this->node->setAttribute("oncanplaythrough", $oncanplaythrough);
            if ($onchange) $this->node->setAttribute("onchange", $onchange);
            if ($onclick) $this->node->setAttribute("onclick", $onclick);
            if ($oncontextmenu) $this->node->setAttribute("oncontextmenu", $oncontextmenu);
            if ($ondblclick) $this->node->setAttribute("ondblclick", $ondblclick);
            if ($ondrag) $this->node->setAttribute("ondrag", $ondrag);
            if ($ondragend) $this->node->setAttribute("ondragend", $ondragend);
            if ($ondragenter) $this->node->setAttribute("ondragenter", $ondragenter);
            if ($ondragleave) $this->node->setAttribute("ondragleave", $ondragleave);
            if ($ondragover) $this->node->setAttribute("ondragover", $ondragover);
            if ($ondragstart) $this->node->setAttribute("ondragstart", $ondragstart);
            if ($ondrop) $this->node->setAttribute("ondrop", $ondrop);
            if ($ondurationchange) $this->node->setAttribute("ondurationchange", $ondurationchange);
            if ($onemptied) $this->node->setAttribute("onemptied", $onemptied);
            if ($onended) $this->node->setAttribute("onended", $onended);
            if ($onerror) $this->node->setAttribute("onerror", $onerror);
            if ($onfocus) $this->node->setAttribute("onfocus", $onfocus);
            if ($onformchange) $this->node->setAttribute("onformchange", $onformchange);
            if ($onforminput) $this->node->setAttribute("onforminput", $onforminput);
            if ($oninput) $this->node->setAttribute("oninput", $oninput);
            if ($oninvalid) $this->node->setAttribute("oninvalid", $oninvalid);
            if ($onkeydown) $this->node->setAttribute("onkeydown", $onkeydown);
            if ($onkeypress) $this->node->setAttribute("onkeypress", $onkeypress);
            if ($onkeyup) $this->node->setAttribute("onkeyup", $onkeyup);
            if ($onload) $this->node->setAttribute("onload", $onload);
            if ($onloadeddata) $this->node->setAttribute("onloadeddata", $onloadeddata);
            if ($onloadedmetadata) $this->node->setAttribute("onloadedmetadata", $onloadedmetadata);
            if ($onloadstart) $this->node->setAttribute("onloadstart", $onloadstart);
            if ($onmousedown) $this->node->setAttribute("onmousedown", $onmousedown);
            if ($onmousemove) $this->node->setAttribute("onmousemove", $onmousemove);
            if ($onmouseout) $this->node->setAttribute("onmouseout", $onmouseout);
            if ($onmouseover) $this->node->setAttribute("onmouseover", $onmouseover);
            if ($onmouseup) $this->node->setAttribute("onmouseup", $onmouseup);
            if ($onmousewheel) $this->node->setAttribute("onmousewheel", $onmousewheel);
            if ($onmouseenter) $this->node->setAttribute("onmouseenter", $onmouseenter);
            if ($onmouseleave) $this->node->setAttribute("onmouseleave", $onmouseleave);
            if ($onpause) $this->node->setAttribute("onpause", $onpause);
            if ($onplay) $this->node->setAttribute("onplay", $onplay);
            if ($onplaying) $this->node->setAttribute("onplaying", $onplaying);
            if ($onprogress) $this->node->setAttribute("onprogress", $onprogress);
            if ($onratechange) $this->node->setAttribute("onratechange", $onratechange);
            if ($onreset) $this->node->setAttribute("onreset", $onreset);
            if ($onresize) $this->node->setAttribute("onresize", $onresize);
            if ($onreadystatechange) $this->node->setAttribute("onreadystatechange", $onreadystatechange);
            if ($onscroll) $this->node->setAttribute("onscroll", $onscroll);
            if ($onseeked) $this->node->setAttribute("onseeked", $onseeked);
            if ($onseeking) $this->node->setAttribute("onseeking", $onseeking);
            if ($onselect) $this->node->setAttribute("onselect", $onselect);
            if ($onshow) $this->node->setAttribute("onshow", $onshow);
            if ($onstalled) $this->node->setAttribute("onstalled", $onstalled);
            if ($onsubmit) $this->node->setAttribute("onsubmit", $onsubmit);
            if ($onsuspend) $this->node->setAttribute("onsuspend", $onsuspend);
            if ($ontimeupdate) $this->node->setAttribute("ontimeupdate", $ontimeupdate);
            if ($onvolumechange) $this->node->setAttribute("onvolumechange", $onvolumechange);
            if ($onwaiting) $this->node->setAttribute("onwaiting", $onwaiting);
            if ($onpointercancel) $this->node->setAttribute("onpointercancel", $onpointercancel);
            if ($onpointerdown) $this->node->setAttribute("onpointerdown", $onpointerdown);
            if ($onpointerenter) $this->node->setAttribute("onpointerenter", $onpointerenter);
            if ($onpointerleave) $this->node->setAttribute("onpointerleave", $onpointerleave);
            if ($onpointerlockchange) $this->node->setAttribute("onpointerlockchange", $onpointerlockchange);
            if ($onpointerlockerror) $this->node->setAttribute("onpointerlockerror", $onpointerlockerror);
            if ($onpointermove) $this->node->setAttribute("onpointermove", $onpointermove);
            if ($onpointerout) $this->node->setAttribute("onpointerout", $onpointerout);
            if ($onpointerover) $this->node->setAttribute("onpointerover", $onpointerover);
            if ($onpointerup) $this->node->setAttribute("onpointerup", $onpointerup);
            if ($ariaActivedescendant) $this->node->setAttribute("aria-activedescendant", $ariaActivedescendant);
            if ($ariaAtomic) $this->node->setAttribute("aria-atomic", $ariaAtomic);
            if ($ariaAutocomplete) $this->node->setAttribute("aria-autocomplete", $ariaAutocomplete);
            if ($ariaBusy) $this->node->setAttribute("aria-busy", $ariaBusy);
            if ($ariaChecked) $this->node->setAttribute("aria-checked", $ariaChecked);
            if ($ariaColcount) $this->node->setAttribute("aria-colcount", $ariaColcount);
            if ($ariaColindex) $this->node->setAttribute("aria-colindex", $ariaColindex);
            if ($ariaColspan) $this->node->setAttribute("aria-colspan", $ariaColspan);
            if ($ariaControls) $this->node->setAttribute("aria-controls", $ariaControls);
            if ($ariaCurrent) $this->node->setAttribute("aria-current", $ariaCurrent);
            if ($ariaDescribedby) $this->node->setAttribute("aria-describedby", $ariaDescribedby);
            if ($ariaDisabled) $this->node->setAttribute("aria-disabled", $ariaDisabled);
            if ($ariaDropeffect) $this->node->setAttribute("aria-dropeffect", $ariaDropeffect);
            if ($ariaErrormessage) $this->node->setAttribute("aria-errormessage", $ariaErrormessage);
            if ($ariaExpanded) $this->node->setAttribute("aria-expanded", $ariaExpanded);
            if ($ariaFlowto) $this->node->setAttribute("aria-flowto", $ariaFlowto);
            if ($ariaGrabbed) $this->node->setAttribute("aria-grabbed", $ariaGrabbed);
            if ($ariaHaspopup) $this->node->setAttribute("aria-haspopup", $ariaHaspopup);
            if ($ariaHidden) $this->node->setAttribute("aria-hidden", $ariaHidden);
            if ($ariaInvalid) $this->node->setAttribute("aria-invalid", $ariaInvalid);
            if ($ariaLabel) $this->node->setAttribute("aria-label", $ariaLabel);
            if ($ariaLabelledby) $this->node->setAttribute("aria-labelledby", $ariaLabelledby);
            if ($ariaLevel) $this->node->setAttribute("aria-level", $ariaLevel);
            if ($ariaLive) $this->node->setAttribute("aria-live", $ariaLive);
            if ($ariaModal) $this->node->setAttribute("aria-modal", $ariaModal);
            if ($ariaMultiline) $this->node->setAttribute("aria-multiline", $ariaMultiline);
            if ($ariaMultiselectable) $this->node->setAttribute("aria-multiselectable", $ariaMultiselectable);
            if ($ariaOrientation) $this->node->setAttribute("aria-orientation", $ariaOrientation);
            if ($ariaOwns) $this->node->setAttribute("aria-owns", $ariaOwns);
            if ($ariaPlaceholder) $this->node->setAttribute("aria-placeholder", $ariaPlaceholder);
            if ($ariaPosinset) $this->node->setAttribute("aria-posinset", $ariaPosinset);
            if ($ariaPressed) $this->node->setAttribute("aria-pressed", $ariaPressed);
            if ($ariaReadonly) $this->node->setAttribute("aria-readonly", $ariaReadonly);
            if ($ariaRelevant) $this->node->setAttribute("aria-relevant", $ariaRelevant);
            if ($ariaRequired) $this->node->setAttribute("aria-required", $ariaRequired);
            if ($ariaRoledescription) $this->node->setAttribute("aria-roledescription", $ariaRoledescription);
            if ($ariaRowcount) $this->node->setAttribute("aria-rowcount", $ariaRowcount);
            if ($ariaRowindex) $this->node->setAttribute("aria-rowindex", $ariaRowindex);
            if ($ariaRowspan) $this->node->setAttribute("aria-rowspan", $ariaRowspan);
            if ($ariaSelected) $this->node->setAttribute("aria-selected", $ariaSelected);
            if ($ariaSetsize) $this->node->setAttribute("aria-setsize", $ariaSetsize);
            if ($ariaSort) $this->node->setAttribute("aria-sort", $ariaSort);
            if ($ariaValuemax) $this->node->setAttribute("aria-valuemax", $ariaValuemax);
            if ($ariaValuemin) $this->node->setAttribute("aria-valuemin", $ariaValuemin);
            if ($ariaValuenow) $this->node->setAttribute("aria-valuenow", $ariaValuenow);
            if ($ariaValuetext) $this->node->setAttribute("aria-valuetext", $ariaValuetext);
            if ($ariaDetails) $this->node->setAttribute("aria-details", $ariaDetails);
            if ($ariaKeyshortcuts) $this->node->setAttribute("aria-keyshortcuts", $ariaKeyshortcuts);
      }
}
