// Import crypto utilities for OCID signing
import "./crypto.js";

// Import the SIWE module
import { createSiwe } from "./siwe.js";
// Initialize SIWE when the document is loaded
document.addEventListener("DOMContentLoaded", function () {
    createSiwe();
});