# Crypto-ERC

**Crypto-ERC** is a simple and free PHP-based API demo for interacting with ERC-compatible crypto wallets.
It allows developers to **generate wallets, check balances, and send transactions** using lightweight PHP endpoints.

This project is designed for **learning, testing, and building crypto tools** quickly without complex frameworks.

---

# 🚀 Features

* Create new crypto wallets
* Generate **wallet address, private key, and mnemonic phrase**
* Check wallet balances
* Send transactions between wallets
* Simple **REST-style API**
* Built entirely in **pure PHP**
* Free for everyone to use

---

# 📂 API Endpoints

## 1️⃣ Create Wallet

**File:** `build.php`

Generates a new wallet including:

* Wallet address
* Private key
* Mnemonic phrase (seed phrase)

### Example Request

```
GET /build.php
```

### Example Response

```json
{
  "status":"success",
  "address": "0x1234567890abcdef...",
  "private_key": "abcdef123456...",
  "mnemonic": "apple banana river moon ..."
}
```

---

# 2️⃣ Check Wallet Balance

**File:** `balance.php`

Returns the balance of a wallet address.

### Parameters

| Parameter | Type   | Description             |
| --------- | ------ | ----------------------- |
| chain     | string | Chainn name to check    |
| address   | string | Wallet address to check |

### Example Request

```
GET /balance.php?chain=bnb&address=0x1234567890abcdef
```

### Example Response

```json
{
  "address": "0x1234567890abcdef",
  "balance": "0.5421"
}
```

---

# 3️⃣ Send Transaction

**File:** `send.php`

Transfers crypto from one wallet to another using the **private key of the sender**.

### Parameters

| Parameter   | Type   | Description             |
| ----------- | ------ | ----------------------- |
| from        | string | Sender wallet address   |
| private_key | string | Sender private key      |
| to          | string | Receiver wallet address |
| amount      | number | Amount to send          |

### Example Request

```
GET /send.php?from=0x1234567890abcdef&private_key=abcdef123456&to=0x987654321&amount=0.1
```

### Example Response

```json
{
  "status": "success",
  "from": "0x1234567890abcdef",
  "to": "0x987654321",
  "amount": "0.1",
  "tx_hash": "0x2adc377ed8d9335b5070f4578255996e97a34cf388fa181b57ec8b702bceeb27"
}
```

---

# ⚙️ Requirements

* PHP **7.4+**
* Apache / Nginx web server
* Blockchain RPC endpoint

---

# 📦 Installation

Clone the repository:

```
git clone https://github.com/yourusername/Crypto-ERC.git
```

Move the files to your server directory and access the API endpoints from your browser or application.

---

# ⚠️ Security Notice

This project is a **demo API implementation**.

Do **NOT use in production** without implementing proper security practices such as:

* Private key encryption
* Input validation
* Rate limiting
* Secure RPC configuration
* Transaction verification

---

# 🧑‍💻 Use Cases

* Blockchain learning
* Crypto API testing
* Wallet automation tools
* Crypto bots
* Web3 experiments

---

# 📜 License

Free and open-source for everyone to use and modify.

---

⭐ If you like this project, please consider **starring the repository** on GitHub.
