
class Validate{
    validName(value){
        const nombreRX = /^([a-zA-ZÀ-ÖØ-öø-ÿ]{3,25})([\s]?)([a-zA-ZÀ-ÖØ-öø-ÿ]{0,25})$/g;
        const resp = value.match(nombreRX) ? true : false;
        return resp;
    }
    validTele(value){
        const teleRX = /^(3)(0|1|2|3|5)[0-9]\d{7}$/g;
        const resp = value.match(teleRX) ? true : false;
        return resp;    
    }
    validaAddress(value){
        const addressRX = /^\d{6}$/g;
        const resp = value.match(addressRX) ? true : false;
        return resp;
    }
    validMail(value){
        const mailRX = /^([\w.]+[^#$%&\/()='"!?¡]\w*-*)([@])(\w)+(\.[a-z]{2,3})$/g;
        const resp = value.match(mailRX)? true : false;

        return resp;
    }
    validPass(value){
        const passRX = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{3,16}$/g;
        const resp = value.match(passRX)? true : false;
        return resp;
    } 

    validForm = (objeto) => {
        const valores = Object.values(objeto);
        let resp = valores.findIndex(e => e === false); 
        return resp;
    }

    validMsn(value){
        const msnRX = /^[\W.a-zA-ZÀ-ÖØ-öø-ÿ\s\d]{2,100}/;
        const resp = value.match(msnRX)? true : false;
        return resp;
    }
} 

export {Validate}
