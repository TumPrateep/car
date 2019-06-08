using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Carjaidee
{
    #region Payment
    public class Payment
    {
        #region Member Variables
        protected int _paymentId;
        protected unknown _date;
        protected unknown _time;
        protected string _receivebank;
        protected string _transfer;
        protected unknown _money;
        protected string _slip;
        protected int _orderId;
        protected int _created_by;
        protected DateTime _created_at;
        protected unknown _deposit;
        protected string _status;
        protected int _transferbankId;
        #endregion
        #region Constructors
        public Payment() { }
        public Payment(unknown date, unknown time, string receivebank, string transfer, unknown money, string slip, int orderId, int created_by, DateTime created_at, unknown deposit, string status, int transferbankId)
        {
            this._date=date;
            this._time=time;
            this._receivebank=receivebank;
            this._transfer=transfer;
            this._money=money;
            this._slip=slip;
            this._orderId=orderId;
            this._created_by=created_by;
            this._created_at=created_at;
            this._deposit=deposit;
            this._status=status;
            this._transferbankId=transferbankId;
        }
        #endregion
        #region Public Properties
        public virtual int PaymentId
        {
            get {return _paymentId;}
            set {_paymentId=value;}
        }
        public virtual unknown Date
        {
            get {return _date;}
            set {_date=value;}
        }
        public virtual unknown Time
        {
            get {return _time;}
            set {_time=value;}
        }
        public virtual string Receivebank
        {
            get {return _receivebank;}
            set {_receivebank=value;}
        }
        public virtual string Transfer
        {
            get {return _transfer;}
            set {_transfer=value;}
        }
        public virtual unknown Money
        {
            get {return _money;}
            set {_money=value;}
        }
        public virtual string Slip
        {
            get {return _slip;}
            set {_slip=value;}
        }
        public virtual int OrderId
        {
            get {return _orderId;}
            set {_orderId=value;}
        }
        public virtual int Created_by
        {
            get {return _created_by;}
            set {_created_by=value;}
        }
        public virtual DateTime Created_at
        {
            get {return _created_at;}
            set {_created_at=value;}
        }
        public virtual unknown Deposit
        {
            get {return _deposit;}
            set {_deposit=value;}
        }
        public virtual string Status
        {
            get {return _status;}
            set {_status=value;}
        }
        public virtual int TransferbankId
        {
            get {return _transferbankId;}
            set {_transferbankId=value;}
        }
        #endregion
    }
    #endregion
}